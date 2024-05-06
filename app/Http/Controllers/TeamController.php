<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeam;
use Illuminate\Support\Facades\Auth;
use App\Models\Invite;
use App\Models\ReportCategory;
use App\Models\Question;
use App\Models\Apply;
use App\Models\User;

class TeamController extends Controller
{
    private $team;
    private $user_team;
    private $invite;
    private $report_category;
    private $question;
    private $apply;
    private $user;

    public function __construct(Team $team, UserTeam $user_team, Invite $invite, ReportCategory $report_category, Question $question, Apply $apply, User $user){
        $this->team = $team;
        $this->user_team = $user_team;
        $this->invite = $invite;
        $this->report_category = $report_category;
        $this->question = $question;
        $this->apply = $apply;
        $this->user = $user;
    }

    public function index(){
        $deleted_teams = $this->team->onlyTrashed()->pluck('id')->toArray();
        $my_teams = $this->user_team->where('user_id', Auth::user()->id)->get();
        foreach($my_teams as $key => $my_team){
            if(in_array($my_team->team_id, $deleted_teams)){
                unset($my_teams[$key]);
            }
        }
        $inviting_teams = $this->invite->where('user_id', Auth::user()->id)->get();
        foreach($inviting_teams as $key => $inviting_team){
            if(in_array($inviting_team->team_id, $deleted_teams)){
                unset($inviting_teams[$key]);
            }
        }

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
        $deleted_members = $this->user->onlyTrashed()->pluck('id')->toArray();
        $team_members = $this->user_team->where('team_id', $t_id)->orderBy('role', 'ASC')->paginate(10);
        foreach($team_members as $key => $team_member){
            if(in_array($team_member->user_id, $deleted_members)){
                unset($team_members[$key]);
            }
        }

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
        $deleted_members = $this->user->onlyTrashed()->pluck('id')->toArray();
        $team_members = $this->user_team->where('team_id', $team->id)->orderBy('role', 'ASC')->get();
        foreach($team_members as $key => $team_member){
            if(in_array($team_member->user_id, $deleted_members)){
                unset($team_members[$key]);
            }
        }
        return view('user.team.manage-members')->with('team', $team)->with('team_members', $team_members);
    }

    public function inviteMembers(Team $team){
        $deleted_members = $this->user->onlyTrashed()->pluck('id')->toArray();
        $appliers = $this->apply->where('team_id', $team->id)->get();
        foreach($appliers as $key => $applier){
            if(in_array($applier->user_id, $deleted_members)){
                unset($appliers[$key]);
            }
        }
        return view('user.team.invite-members')->with('team', $team)->with('appliers', $appliers);
    }

    public function update(Request $request, Team $team){
        if($team->isTeamAdmin() || $team->isTeamOwner()){
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
        }

        return redirect()->route('team.setting', $team);
    }

    public function kickMember(Request $request, Team $team){
        if($team->isTeamAdmin() || $team->isTeamOwner()){
            $this->user_team->where('team_id', $team->id)->where('user_id', $request->user_id)->delete();
        }

        return redirect()->back();
    }

    public function promoteMember(Request $request, Team $team){
        if($team->isTeamAdmin() || $team->isTeamOwner()){
            $this->user_team->where('team_id', $team->id)->where('user_id', $request->user_id)->delete();
            $this->user_team->team_id = $team->id;
            $this->user_team->user_id = $request->user_id;
            $this->user_team->role = 2;
            $this->user_team->save();
        }

        return redirect()->back();
    }

    public function demoteMember(Request $request, Team $team){
        if($team->isTeamAdmin() || $team->isTeamOwner()){
            $this->user_team->where('team_id', $team->id)->where('user_id', $request->user_id)->delete();
            $this->user_team->team_id = $team->id;
            $this->user_team->user_id = $request->user_id;
            $this->user_team->role = 3;
            $this->user_team->save();
        }

        return redirect()->back();
    }

    public function declineApply(Request $request, Team $team){
        if($team->isTeamAdmin() || $team->isTeamOwner()){
            $this->apply->where('user_id', $request->user_id)->where('team_id', $team->id)->delete();
        }
        return redirect()->back();
    }

    public function acceptApply(Request $request, Team $team){
        if($team->isTeamAdmin() || $team->isTeamOwner()){
            $this->apply->where('user_id', $request->user_id)->where('team_id', $team->id)->delete();
            $this->user_team->user_id = $request->user_id;
            $this->user_team->team_id = $team->id;
            $this->user_team->role = 3;
            $this->user_team->save();
        }
        return redirect()->back();
    }

    public function inviteSearch(Request $request, Team $team){
        $suggestions = $this->user->where('username', 'LIKE', '%'.$request->user_keyword.'%')->get();
        $team_members = $this->user_team->where('team_id', $team->id)->get();
        $deleted_members = $this->user->onlyTrashed()->pluck('id')->toArray();

        foreach($team_members as $key => $team_member){
            if(in_array($team_member->user_id, $deleted_members)){
                unset($team_members[$key]);
            }
        }

        foreach($suggestions as $key => $suggestion){
            foreach($team_members as $team_member){
                if($suggestion->id == $team_member->user->id){
                    unset($suggestions[$key]);
                }
            }
        }

        return view('user.team.invite-search-result')->with('suggestions', $suggestions)->with('old_keyword', $request->user_keyword)->with('team', $team);
    }

    public function invite(Request $request, Team $team){
        if($team->isTeamAdmin() || $team->isTeamOwner()){
            $this->invite->user_id = $request->user_id;
            $this->invite->team_id = $team->id;
            $this->invite->inviter_id = Auth::user()->id;
            $this->invite->save();
        }
        return redirect()->back();
    }

    public function declineInvite(Request $request){
        $this->invite->where('user_id', Auth::user()->id)->where('team_id', $request->team_id)->delete();

        return redirect()->back();
    }

    public function acceptInvite(Request $request){
        $this->invite->where('user_id', Auth::user()->id)->where('team_id', $request->team_id)->delete();
        $this->user_team->user_id = Auth::user()->id;
        $this->user_team->team_id = $request->team_id;
        $this->user_team->role = 3;
        $this->user_team->save();

        return redirect()->back();
    }

    public function delete(Team $team){
        if($team->isTeamOwner()){
            $this->team->destroy($team->id);
        }

        return redirect()->route('team');
    }

}
