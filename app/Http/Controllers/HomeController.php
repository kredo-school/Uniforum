<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\QuestionReport;

class HomeController extends Controller
{
    private $question;
    private $category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Question $question, Category $category)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->category = $category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home_questions = $this->question->with('likes')->where('uni_id', Auth::user()->uni_id)->where('team', null)->latest()->paginate(10);
        $categories = $this->category->get();
        foreach($home_questions as $key => $home_question){
            if($home_question->question_report->count() >= QuestionReport::SHADOW_BAN_COUNT){
                unset($home_questions[$key]);
            }
        }

        return view('home')->with('home_questions', $home_questions)->with('categories', $categories);
    }

    public function searchQuestion(Request $request){
        if(!$request->search_category){
            $request->validate([
                'search_keyword' => 'required'
            ]);
        }

        if($request->search_keyword && $request->search_category){
            $suggestions = $this->question->where('content', 'LIKE', '%'.$request->search_keyword.'%')->where('category_id', $request->search_category)->where('uni_id', Auth::user()->uni_id)->where('team', null)->withCount('question_report')->orderBy('question_report_count', 'asc')->get();
            $category_name = $this->category->where('id', $request->search_category)->pluck('name');
        }
        elseif($request->search_keyword){
            $suggestions = $this->question->where('content', 'LIKE', '%'.$request->search_keyword.'%')->where('uni_id', Auth::user()->uni_id)->where('team', null)->withCount('question_report')->orderBy('question_report_count', 'asc')->get();
            $category_name[] = '';
        }
        elseif($request->search_category){
            $suggestions = $this->question->where('category_id', $request->search_category)->where('uni_id', Auth::user()->uni_id)->where('team', null)->withCount('question_report')->orderBy('question_report_count', 'asc')->get();
            $category_name = $this->category->where('id', $request->search_category)->pluck('name');
        }
        return view('search-result')->with('suggestions', $suggestions)->with('keyword', $request->search_keyword)->with('category_name', $category_name[0]);
    }
}
