<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionsController extends Controller
{
    private $question;

    public function __construct(Question $question){
        $this->question = $question;
    }


    public function index(){
        $all_questions = $this->question->withTrashed()->latest()->paginate(8);
        return view('super-admin.questions.index')->with('all_questions', $all_questions);
    }

    public function activate($q_id){
        $this->question->onlyTrashed()->where('id', $q_id)->restore();

        return redirect()->back();
    }

    public function deactivate($q_id){

        $this->question->destroy($q_id);

        return redirect()->back();
    }
}
