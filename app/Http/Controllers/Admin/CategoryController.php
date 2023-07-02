<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
//        $newImageName = time() . '.' . $request->image->getClientOriginalExtension();
        $image = $request->file('image')->store('categories');

        Categories::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        return to_route('admin.categories.index')->with('success',"The Category is created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        return view('admin.categories.edit',compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $request->validate([
           'name' => 'required',
           'description' => 'required',
        ]);
        $image = $category->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('categories');
        }
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);
        return to_route('admin.categories.index')->with('success',"The Category is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        Storage::delete($category->image);
        $category->menus()->detach();
        $category->delete();

        return to_route("admin.categories.index")->with('success',"The Category is deleted successfully");
    }
/*
    public function storeImage(Request $request)
    {
        if($request->image) {
            $newImageName = time() . '.' . $request->image->getClientOriginalExtension();
            return $request->image->move('category', $newImageName);
        }


    }*/

}
