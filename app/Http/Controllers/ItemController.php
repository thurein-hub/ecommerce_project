<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $items = Item::all();
        return view('backend.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands= Brand::all();
        $subcategories= Subcategory::all();
        $lastItem = Item::orderBy('id','desc')->first();
        return view('backend.item.create',compact('brands','subcategories','lastItem'));
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
            "codeno" => "required",
            "photo" => "required|mimes:jpeg,jpg,png",
            "name" => "required",
            "price" => "required|integer",
            "description" => "required",
            "brand_id" => "required",
            "subcategory_id" => "required"
        ]);

        // upload file
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

            // $path = '/storage/'.$filePath;
        }

        // data insert
        $item = new Item; // create new object
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->photo = $filePath;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();

        // redirect
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands= Brand::all();
        $subcategories= Subcategory::all();
        return view('backend.item.edit',compact('brands','subcategories','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // validation
        $request->validate([
            "codeno" => "required",
            "name" => "required",
            "price" => "required|integer",
            "description" => "required",
            "brand_id" => "required",
            "subcategory_id" => "required"
        ]);

        // upload file
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            if($request->oldphoto){
                $old_photo=public_path('storage/').$request->oldphoto;
                unlink($old_photo);
            }

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

            // $path = '/storage/'.$filePath;
        }else{
            $filePath =$request->oldphoto;
        }

        // data insert
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->photo = $filePath;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();

        // redirect
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        // DB::table('items')->where('id', $item->id)->delete();
        return redirect()->route('item.index');
    }
}
