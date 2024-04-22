<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionLike extends Model
{
    use HasFactory;

    protected $table = 'question_like';
    public $timestamps = false;

    public function question(){
        return $this->belongsTo(Question::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
