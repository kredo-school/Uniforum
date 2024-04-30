<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTeam;
use Illuminate\Support\Facades\Auth;

class UserTeamController extends Controller
{
    private $user_team;

    public function __construct(UserTeam $user_team){
        $this->user_team = $user_team;
    }

    public function join(Request $request)
    {
        $this->user_team->team_id = $request->team_id;
        $this->user_team->user_id = Auth::user()->id;
        $this->user_team->role = 3;
        $this->user_team->save();

        return redirect()->back();
    }

    public function leave(Request $request){
        $this->user_team->where('team_id', $request->team_id)->where('user_id', Auth::user()->id)->delete();

        return redirect()->route('team');
    }
}
