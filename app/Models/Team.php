<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    public function user_team(){
        return $this->hasMany(UserTeam::class, 'team_id');
    }


    public function membered(){
        return $this->user_team()->where('user_id', Auth::user()->id)->exists();
    }

    public function invite(){
        return $this->hasMany(Invite::class, 'team_id');
    }

    public function apply(){
        return $this->hasMany(Apply::class, 'team_id');
    }

    public function inviting(){
        return $this->invite()->where('user_id', Auth::user()->id)->exists();
    }

    public function isTeamAdmin(){
        return $this->user_team()->where('user_id', Auth::user()->id)->where('role', 2)->exists();
    }

    public function isTeamOwner(){
        return $this->user_team()->where('user_id', Auth::user()->id)->where('role', 1)->exists();
    }

    public function applied(){
        return $this->apply()->where('user_id', Auth::user()->id)->exists();
    }

    public function invited(){
        return $this->invite()->where('user_id', Auth::user()->id)->exists();
    }
}
