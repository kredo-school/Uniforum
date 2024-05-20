<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionReport extends Model
{
    use HasFactory;

    const SHADOW_BAN_COUNT = 5;

    protected $table = 'question_report';

    public function report_category(){
        return $this->belongsTo(ReportCategory::class, 'report_category_id');
    }
}
