<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Category;
use App\Models\ReportCategory;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    private $question;
    private $answer;
    private $report_category;

    public function __construct(Question $question, Answer $answer, ReportCategory $report_category){
        $this->question = $question;
        $this->answer = $answer;
        $this->report_category = $report_category;
    }

    public function show($q_id){
        $detail = $this->question->findOrFail($q_id);
        $posted_answers = $this->answer->where('q_id', $q_id)->latest()->paginate(5);
        $report_categories = $this->report_category->get();

        return view('user.question.show')->with('detail', $detail)->with('posted_answers', $posted_answers)->with('report_categories', $report_categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'team' => 'required',
            'title' => 'required|string|min:1|max:100',
            'content' => 'required|string|min:1|max:1000',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:1048'
        ]);

        if($request->team != '0'){
            $this->question->team = $request->team;
        }
        $this->question->title = $request->title;
        $this->question->content = $request->content;
        $this->question->category_id = $request->category;
        if($request->image){
            $this->question->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        }
        $this->question->user_id = Auth::user()->id;
        $this->question->uni_id = Auth::user()->uni_id;
        $this->question->save();

        return redirect()->route('home');
    }
}
