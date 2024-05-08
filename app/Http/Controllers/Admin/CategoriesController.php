<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }


    public function index(){
        $all_categories = $this->category->orderBy('id', 'ASC')->get();

        return view('super-admin.categories.index')->with('all_categories', $all_categories);
    }

    public function update(Request $request, $category_id){
        $update = $this->category->findOrFail($category_id);
        $update->name = $request->new_name;
        $update->save();

        return redirect()->back();
    }

    public function delete($category_id){
        $this->category->destroy($category_id);

        return redirect()->back();
    }

    public function store(Request $request){
        $this->category->name = $request->name;
        $this->category->save();
        
        return redirect()->back();
    }
}
