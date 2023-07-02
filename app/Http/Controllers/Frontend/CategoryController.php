<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view("categories.index",compact("categories"));
    }
    public function show(Categories $category){

        return view("categories.show",compact("category"));
    }
}
