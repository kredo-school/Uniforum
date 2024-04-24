<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionReport;
use Illuminate\Support\Facades\Auth;

class QuestionReportController extends Controller
{
    private $q_report;
    public function __construct(QuestionReport $q_report){
        $this->q_report = $q_report;
    }
    public function store(Request $request, $q_id)
    {
        $request->validate([
            'q_report_category' => 'required',
            'q_report_content' => 'required|string|min:1|max:1000',
        ],
        [
            'q_report_category.required' => 'Please select the category.',
            'q_report_content.required' => 'Please write the reason why you would report this question.',
        ]
    );

        $this->q_report->q_id = $q_id;
        $this->q_report->user_id = Auth::user()->id;
        $this->q_report->content = $request->q_report_content;
        $this->q_report->report_category_id = $request->q_report_category;

        $this->q_report->save();

        return redirect()->back();
    }
}
