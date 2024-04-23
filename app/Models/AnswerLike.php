<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerLike extends Model
{
    use HasFactory;

    protected $table = 'answer_like';
    public $timestamps = false;

    public function question(){
        return $this->belongsTo(Answer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
