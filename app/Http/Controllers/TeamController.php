<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeam;
use Illuminate\Support\Facades\Auth;
use App\Models\Invite;
use App\Models\ReportCategory;
use App\Models\Question;

class TeamController extends Controller
{
    private $team;
    private $user_team;
    private $invite;
    private $report_category;
    private $question;

    public function __construct(Team $team, UserTeam $user_team, Invite $invite, ReportCategory $report_category, Question $question){
        $this->team = $team;
        $this->user_team = $user_team;
        $this->invite = $invite;
        $this->report_category = $report_category;
        $this->question = $question;
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

    public function view($t_id){
        $detail = $this->team->findOrFail($t_id);
        $report_categories = $this->report_category->get();
        $team_questions = $this->question->where('team', $t_id)->latest()->paginate(5);

        return view('user.team.view')->with('detail', $detail)->with('report_categories', $report_categories)->with('team_questions', $team_questions);

    }

    public function viewMember($t_id){
        $detail = $this->team->findOrFail($t_id);
        $report_categories = $this->report_category->get();
        $team_members = $this->user_team->where('team_id', $t_id)->paginate(10);

        return view('user.team.view-member')->with('detail', $detail)->with('report_categories', $report_categories)->with('team_members', $team_members);

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

    public function setting(Team $team){
        if($team->isTeamOwner() || $team->isTeamAdmin()){
            return view('user.team.setting')->with('team', $team);
        }else{
            return redirect()->back();
        }
    }

    public function edit(Team $team){
        return view('user.team.edit')->with('team', $team);
    }

    public function manageMembers(Team $team){
        return view('user.team.manage-members')->with('team', $team);
    }

    public function inviteMembers(Team $team){
        return view('user.team.invite-members')->with('team', $team);
    }

    public function update(Request $request, Team $team){
        $request->validate([
            'update_team_name' => 'required|string|min:1|max:50',
            'update_team_icon' => 'image|mimes:jpeg,png,jpg,gif|max:1048',
            'update_team_description' => 'required|string|min:1|max:50',
            'update_team_type' => 'required'
        ]);

        $update = $team;
        $update->name = $request->update_team_name;
        $update->description = $request->update_team_description;
        if($request->update_team_icon){
            $update->icon = 'data:image/' . $request->update_team_icon->extension() . ';base64,' . base64_encode(file_get_contents($request->update_team_icon));
        }

        $update->save();

        return redirect()->route('team.setting', $team);
    }
}
