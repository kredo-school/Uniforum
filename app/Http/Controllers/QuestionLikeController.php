<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionLike;
use Illuminate\Support\Facades\Auth;

class QuestionLikeController extends Controller
{
    private $q_like;
    
    public function __construct(QuestionLike $q_like){
        $this->q_like = $q_like;
    }

    public function store(Request $request, $q_id)
    {
        $this->q_like->q_id = $q_id;
        $this->q_like->user_id = Auth::user()->id;
        $this->q_like->save();

        return redirect()->back();
    }


    public function destroy($q_id)
    {
        $this->q_like->where('q_id', $q_id)->where('user_id', Auth::user()->id)->delete();

        return redirect()->back();
    }
}
