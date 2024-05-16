<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->hasMany(User::class, 'uni_id');
    }
}
