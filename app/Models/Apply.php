<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = 'apply';
    protected $fillable = ['user_id', 'team_id'];
    public $timestamps = false;

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
