<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            "name" => "required|unique:brands|max:191|min:5",
            "logo" => "required|mimes:jpeg,jpg,png"
        ]);

        //upload file
        if($request->file()){

            $fileName = time().'_'.$request->logo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('logo')->storeAs('brandimg', $fileName, 'public');

            // $path = '/storage/'.$filePath;
        }

        // data insert
        $brand = new Brand; // create new object
        $brand->name = $request->name;
        $brand->logo = $filePath;
        $brand->save();

        
        // redirect
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //validation
        $request->validate([
            "name" => "required|max:191|min:5"
            // ,"logo" => "required|mimes:jpeg,jpg,png"
        ]);

        //upload file
        if($request->file()){

            $fileName = time().'_'.$request->logo->getClientOriginalName();

            if($request->oldphoto){
                $old_photo=public_path('storage/').$request->oldphoto;
                unlink($old_photo);
            }

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('logo')->storeAs('brandimg', $fileName, 'public');

            // $path = '/storage/'.$filePath;
        }else{
            $filePath=$request->oldphoto;
        }

        // update data 
        $brand->name = $request->name;
        $brand->logo = $filePath;
        $brand->save();

        
        // redirect
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
