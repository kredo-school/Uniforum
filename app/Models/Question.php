<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function likes(){
        return $this->hasMany(QuestionLike::class, 'q_id');
    }

    public function isLiked(){
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

    public function postscript(){
        return $this->hasOne(Postscript::class, 'q_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'q_id');
    }

    public function question_report(){
        return $this->hasMany(QuestionReport::class, 'q_id');
    }

}
