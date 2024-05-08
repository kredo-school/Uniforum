<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{
    private $team;

    public function __construct(Team $team){
        $this->team = $team;
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
}
