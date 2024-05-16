<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\University;

class UniversitiesController extends Controller
{
    private $university;

    public function __construct(University $university){
        $this->university = $university;
    }

    public function index(){
        $all_universities = $this->university->orderBy('id', 'ASC')->get();

        return view('super-admin.universities.index')->with('all_universities', $all_universities);
    }

    public function update(Request $request, $university_id){
        $update = $this->university->findOrFail($university_id);
        $update->name = $request->new_name;
        $update->save();

        return redirect()->back();
    }

    public function delete($university_id){
        $this->university->destroy($university_id);

        return redirect()->back();
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $this->university->name = $request->name;
        $this->university->save();

        return redirect()->back();
    }

}
