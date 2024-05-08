<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;

class AnswersController extends Controller
{
    private $answer;

    public function __construct(Answer $answer){
        $this->answer = $answer;
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
}
