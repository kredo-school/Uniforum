<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamReport;

class TeamsController extends Controller
{
    private $team;
    private $team_report;

    public function __construct(Team $team, TeamReport $team_report){
        $this->team = $team;
        $this->team_report = $team_report;
    }


    public function index(){
        $all_teams = $this->team->withTrashed()->latest()->paginate(8);
        return view('super-admin.teams.index')->with('all_teams', $all_teams);
    }

    public function activate($team_id){
        $this->team->onlyTrashed()->where('id', $team_id)->restore();

        return redirect()->back();
    }

    public function deactivate($team_id){

        $this->team->destroy($team_id);

        return redirect()->back();
    }

    public function report($team_id){

        $reports = $this->team_report->where('team_id', $team_id)->get();

        return view('super-admin.teams.report')->with('reports', $reports)->with('team_id', $team_id);
    }
}
