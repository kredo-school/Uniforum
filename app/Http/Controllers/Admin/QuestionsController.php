<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionReport;

class QuestionsController extends Controller
{
    private $question;
    private $question_report;

    public function __construct(Question $question, QuestionReport $question_report){
        $this->question = $question;
        $this->question_report = $question_report;
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

    public function report($q_id){

        $reports = $this->question_report->where('q_id', $q_id)->get();

        return view('super-admin.questions.report')->with('reports', $reports)->with('q_id', $q_id);
    }

}
