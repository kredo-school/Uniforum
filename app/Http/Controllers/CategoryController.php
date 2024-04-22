<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;
    
    public function __construct(Category $category){
        $this->category = $category;
    }
}
