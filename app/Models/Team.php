<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Team extends Model
{
    use HasFactory;

    public function user_team(){
        return $this->hasMany(UserTeam::class, 'team_id');
    }

    public function membered(){
        return $this->user_team()->where('user_id', Auth::user()->id)->exists();
    }
}
