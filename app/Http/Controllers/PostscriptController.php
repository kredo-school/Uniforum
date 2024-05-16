<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postscript;

class PostscriptController extends Controller
{
    private $postscript;

    public function __construct(Postscript $postscript){
        $this->postscript = $postscript;
    }

    public function store(Request $request, $q_id)
    {
        $request->validate([
            'ps_content' => 'required|string|min:1|max:1000',
        ],
        [
            'ps_content.required' => 'Please write your postscript.'
        ]);

        $this->postscript->q_id = $q_id;
        $this->postscript->content = $request->ps_content;
        $this->postscript->save();

        return redirect()->back();
    }

}
