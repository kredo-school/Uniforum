<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    private $answer;

    public function __construct(Answer $answer){
        $this->answer = $answer;
    }

    public function store(Request $request, $q_id)
    {
        $request->validate([
            'post_answer_content' => 'required|string|min:1|max:1000',
            'post_answer_image' => 'image|mimes:jpeg,png,jpg,gif|max:1048'
        ]);

        $this->answer->q_id = $q_id;
        $this->answer->user_id = Auth::user()->id;
        $this->answer->content = $request->post_answer_content;
        if($request->post_answer_image){
            $this->answer->image = 'data:image/' . $request->post_answer_image->extension() . ';base64,' . base64_encode(file_get_contents($request->post_answer_image));
        }
        $this->answer->save();

        return redirect()->back();
    }

    public function destroy($a_id){
        $this->answer->destroy($a_id);

        return redirect()->back();
    }
}
