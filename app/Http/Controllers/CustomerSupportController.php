<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerSupportRequest;
use App\Mail\CustomerSupport as CustomerSupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomerSupport;

class CustomerSupportController extends Controller
{
    private $cs;

    public function __construct(CustomerSupport $cs){
        $this->cs = $cs;
    }


    public function send(Request $request)
    {
        $contact = $request->all();
        Mail::to('cs.for.uniforum@example.com')->send(new CustomerSupportMail($contact));
        return redirect()->back();
    }

    public function store(Request $request){

        $request->validate([
            'cs_email' => 'required|email',
            'cs_title' => 'required|string|min:1|max:100',
            'cs_content' => 'required|string|min:1|max:1000',
            'cs_image' => 'image|mimes:jpeg,png,jpg,gif|max:1048'
        ],
        [
            'cs_email.required' => 'Please write your email.',
            'cs_title.required' => 'Please write the title.',
            'cs_content.required' => 'Please write your inquiry.',

        ]);


        $this->cs->email = $request->cs_email;
        $this->cs->title = $request->cs_title;
        $this->cs->content = $request->cs_content;

        if($request->cs_image){
            $this->cs->image = 'data:image/' . $request->cs_image->extension() . ';base64,' . base64_encode(file_get_contents($request->cs_image));
        }

        $this->cs->save();

        // mailtrap email sending
        $this->send($request);

        return redirect()->back();
    }
}
