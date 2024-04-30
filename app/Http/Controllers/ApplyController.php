<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    private $apply;

    public function __construct(Apply $apply){
        $this->apply = $apply;
    }

    public function apply(Request $request)
    {
        $this->apply->team_id = $request->team_id;
        $this->apply->user_id = Auth::user()->id;
        $this->apply->save();

        return redirect()->back();
    }
}
