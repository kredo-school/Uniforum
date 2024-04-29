<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ReportCategory;

class UserController extends Controller
{
    private $user;
    private $report_category;
    public function __construct(User $user, ReportCategory $report_category){
        $this->user = $user;
        $this->report_category = $report_category;
    }

    public function view($user_id){
        $detail = $this->user->findOrFail($user_id);
        $report_categories = $this->report_category->get();
        return view('user.profile.index')->with('detail', $detail)->with('report_categories', $report_categories);
    }
}
