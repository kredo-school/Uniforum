<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    private $question;
    private $answer;

    public function __construct(Question $question, Answer $answer){
        $this->question = $question;
        $this->answer = $answer;
    }

    public function show($q_id){
        $detail = $this->question->findOrFail($q_id);
        $posted_answers = $this->answer->where('q_id', $q_id)->latest()->paginate(5);

        return view('user.question.show')->with('detail', $detail)->with('posted_answers', $posted_answers);
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
