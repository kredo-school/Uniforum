<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReport;
use Illuminate\Support\Facades\Auth;

class UserReportController extends Controller
{
    private $user_report;
    
    public function __construct(UserReport $user_report){
        $this->user_report = $user_report;
    }

    public function store(Request $request, $user_id)
    {
        $request->validate([
            'user_report_category' => 'required',
            'user_report_content' => 'required|string|min:1|max:1000',
        ],
        [
            'user_report_category.required' => 'Please select the category.',
            'user_report_content.required' => 'Please write the reason why you would like to report this user.',
        ]
    );

        $this->user_report->user_id = $user_id;
        $this->user_report->reporter_id = Auth::user()->id;
        $this->user_report->content = $request->user_report_content;
        $this->user_report->report_category_id = $request->user_report_category;

        $this->user_report->save();

        return redirect()->back();
    }
}
