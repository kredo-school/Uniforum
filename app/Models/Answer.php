<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function question(){
        return $this->belongsTo(Question::class, 'q_id')->withTrashed();
    }

    public function likes(){
        return $this->hasMany(AnswerLike::class, 'a_id');
    }

    public function isLiked(){
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

    public function answer_report(){
        return $this->hasMany(AnswerReport::class, 'a_id');
    }
}
