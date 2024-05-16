<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamReport;
use Illuminate\Support\Facades\Auth;

class TeamReportController extends Controller
{
    private $t_report;
    public function __construct(TeamReport $t_report){
        $this->t_report = $t_report;
    }

    public function store(Request $request, $t_id)
    {
        $request->validate([
            't_report_category' => 'required',
            't_report_content' => 'required|string|min:1|max:1000',
        ],
        [
            't_report_category.required' => 'Please select the category.',
            't_report_content.required' => 'Please write the reason why you would like to report this team.',
        ]
    );

        $this->t_report->team_id = $t_id;
        $this->t_report->user_id = Auth::user()->id;
        $this->t_report->content = $request->t_report_content;
        $this->t_report->report_category_id = $request->t_report_category;

        $this->t_report->save();

        return redirect()->back();
    }
}
