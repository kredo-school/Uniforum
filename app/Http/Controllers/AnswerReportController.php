<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerReport;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerReportController extends Controller
{
    private $a_report;
    private $question;
    private $answer;

    public function __construct(AnswerReport $a_report, Question $question, Answer $answer){
        $this->a_report = $a_report;
        $this->question = $question;
        $this->answer = $answer;
    }

    public function store(Request $request, $a_id)
    {
        $request->validate([
            'a_report_category' => 'required',
            'a_report_content' => 'required|string|min:1|max:1000',
        ],
        [
            'a_report_category.required' => 'Please select the category.',
            'a_report_content.required' => 'Please write the reason why you would report this answer.',
        ]
    );

        $this->a_report->a_id = $a_id;
        $this->a_report->user_id = Auth::user()->id;
        $this->a_report->content = $request->a_report_content;
        $this->a_report->report_category_id = $request->a_report_category;

        $this->a_report->save();

        return redirect()->back();
    }
}
