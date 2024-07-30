<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::latest()->paginate(10);
        return view('category.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'status'=>'nullable',
        ]);
    

    category::create([
        'name'=> $request->name,
        'description' =>$request->description,
        'starus'=>$request->status == true ? 1:0,

    ]);
  

    return redirect('/category')->with('status','category created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view ('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
       return view ('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'status'=>'nullable',
        ]);
    

    $category->update([
        'name'=> $request->name,
        'description' =>$request->description,
        'starus'=>$request->status == true ? 1:0,

    ]);

    return redirect('/category')->with('status','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();

        return redirect('/category')->with('status','category Deleted successfully');


    }
}
