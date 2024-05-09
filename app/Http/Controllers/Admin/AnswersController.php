<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\AnswerReport;

class AnswersController extends Controller
{
    private $answer;
    private $answer_report;

    public function __construct(Answer $answer, AnswerReport $answer_report){
        $this->answer = $answer;
        $this->answer_report = $answer_report;
    }


    public function index(){
        $all_answers = $this->answer->withTrashed()->latest()->paginate(8);
        return view('super-admin.answers.index')->with('all_answers', $all_answers);
    }

    public function activate($a_id){
        $this->answer->onlyTrashed()->where('id', $a_id)->restore();

        return redirect()->back();
    }

    public function deactivate($a_id){

        $this->answer->destroy($a_id);

        return redirect()->back();
    }

    public function report($a_id){

        $reports = $this->answer_report->where('a_id', $a_id)->get();

        return view('super-admin.answers.report')->with('reports', $reports)->with('a_id', $a_id);
    }
    
}
