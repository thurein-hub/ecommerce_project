<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            "name" => "required|unique:categories|max:191|min:5",
            "photo" => "required|mimes:jpeg,jpg,png"
        ]);

        // upload file
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('categoryimg', $fileName, 'public');

            // $path = '/storage/'.$filePath;
        }

        // data insert
        $category = new Category; // create new object
        $category->name = $request->name;
        $category->photo = $filePath;
        $category->save();

        // redirect
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // validation
        $request->validate([
            "name" => "required|max:191|min:5",
            "photo" => "sometimes|mimes:jpeg,jpg,png"
        ]);

        // upload file
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // if($request->oldphoto){
            //     $old_photo=public_path().$request->oldphoto;
            //     unlink($old_photo);
            // }

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('categoryimg', $fileName, 'public');

            // $path = '/storage/'.$filePath;
            unlink(public_path('storage/').$request->oldphoto);
            
            
        }else{
            $filePath = $request->oldphoto;
        }

        // data update
        $category->name = $request->name;
        $category->photo = $filePath;
        $category->save();

        // redirect
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        foreach($category->subcategories as $subcategory){
            $subcategory->delete();
        }

        return redirect()->route('category.index');
    }
}
