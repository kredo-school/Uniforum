<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserReport;
use App\Models\UserTeam;
use App\Models\Team;

class UsersController extends Controller
{
    private $user;
    private $user_report;
    private $user_team;
    private $team;

    public function __construct(User $user, UserReport $user_report, UserTeam $user_team, Team $team){
        $this->user = $user;
        $this->user_report = $user_report;
        $this->user_team = $user_team;
        $this->team = $team;
    }


    public function index(){
        $all_users = $this->user->withTrashed()->latest()->paginate(8);
        return view('super-admin.users.index')->with('all_users', $all_users);
    }

    public function activate($user_id){
        $this->user->onlyTrashed()->where('id', $user_id)->restore();

        return redirect()->back();
    }

    public function deactivate($user_id){

        $this->user->destroy($user_id);

        return redirect()->back();
    }

    public function report($user_id){

        $reports = $this->user_report->where('user_id', $user_id)->get();

        return view('super-admin.users.report')->with('reports', $reports)->with('user_id', $user_id);
    }

}
