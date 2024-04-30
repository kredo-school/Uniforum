<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ReportCategory;
use App\Models\Question;

class UserController extends Controller
{
    private $user;
    private $report_category;
    private $question;

    public function __construct(User $user, ReportCategory $report_category, Question $question){
        $this->user = $user;
        $this->report_category = $report_category;
        $this->question = $question;
    }

    public function view($user_id){
        $detail = $this->user->findOrFail($user_id);
        $report_categories = $this->report_category->get();
        $my_questions = $this->question->where('user_id', $user_id)->latest()->paginate(5);
        
        return view('user.profile.index')->with('detail', $detail)->with('report_categories', $report_categories)->with('my_questions', $my_questions);
    }
}
