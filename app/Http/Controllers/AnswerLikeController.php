<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerLike;
use Illuminate\Support\Facades\Auth;

class AnswerLikeController extends Controller
{
    private $a_like;

    public function __construct(AnswerLike $a_like){
        $this->a_like = $a_like;
    }

    public function store($a_id)
    {
        $this->a_like->a_id = $a_id;
        $this->a_like->user_id = Auth::user()->id;
        $this->a_like->save();

        return redirect()->back();
    }

    public function destroy($a_id)
    {
        $this->a_like->where('a_id', $a_id)->where('user_id', Auth::user()->id)->delete();

        return redirect()->back();
    }
}
