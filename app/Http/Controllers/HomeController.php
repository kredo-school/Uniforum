<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $question;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Question $question)
    {
        $this->middleware('auth');
        $this->question = $question;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home_questions = $this->question->with('likes')->where('uni_id', Auth::user()->uni_id)->latest()->paginate(10);

        return view('home')->with('home_questions', $home_questions);
    }
}
