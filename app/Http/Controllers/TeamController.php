<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeam;
use Illuminate\Support\Facades\Auth;
use App\Models\Invite;

class TeamController extends Controller
{
    private $team;
    private $user_team;
    private $invite;

    public function __construct(Team $team, UserTeam $user_team, Invite $invite){
        $this->team = $team;
        $this->user_team = $user_team;
        $this->invite = $invite;
    }

    public function index(){
        $my_teams = $this->user_team->where('user_id', Auth::user()->id)->get();
        $inviting_teams = $this->invite->where('user_id', Auth::user()->id)->get();
        $recommends = $this->team->withCount('user_team')->orderBy('user_team_count', 'desc')->limit(5)->get();
        foreach($recommends as $key => $reco){
            foreach($my_teams as $my_team){
                if($reco->id == $my_team->team_id){
                    unset($recommends[$key]);
                }
            }
        }
        
        return view('user.team.index')->with('my_teams', $my_teams)->with('inviting_teams', $inviting_teams)->with('recommends', $recommends);
    }

    public function store(Request $request){

        $request->validate([
            'team_name' => 'required|string|min:1|max:100',
            'team_description' => 'required|string|min:1|max:1000',
            'team_type' => 'required',
            'team_icon' => 'image|mimes:jpeg,png,jpg,gif|max:1048'
        ]);

        $this->team->name = $request->team_name;
        $this->team->description = $request->team_description;
        if($request->team_icon){
            $this->team->icon = 'data:image/' . $request->team_icon->extension() . ';base64,' . base64_encode(file_get_contents($request->team_icon));
        }
        $this->team->type = $request->team_type;
        $this->team->uni_id = Auth::user()->uni_id;

        $this->team->save();

        if(!empty($this->team->id)){
            $this->user_team->team_id = $this->team->id;
            $this->user_team->user_id = Auth::user()->id;
            $this->user_team->role = 1;

            $this->user_team->save();
        }

        return redirect()->back();
    }
}
