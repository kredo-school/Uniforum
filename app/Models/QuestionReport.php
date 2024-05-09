<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionReport extends Model
{
    use HasFactory;

    protected $table = 'question_report';

    public function report_category(){
        return $this->belongsTo(ReportCategory::class, 'report_category_id');
    }
}
