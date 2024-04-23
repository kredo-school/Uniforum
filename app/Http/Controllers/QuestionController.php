<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    private $question;

    public function __construct(Question $question){
        $this->question = $question;
    }

    public function show($q_id){
        $detail = $this->question->findOrFail($q_id);
        return view('user.question.show')->with('detail', $detail);
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
