<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Item;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands= Brand::all();
        $items = Item::all();
        $bestseller_items= DB::table('item_order')
                    ->groupBy('item_id')
                    // ->havingRaw('SUM(qty)>?',[5])
                    ->orderByRaw('SUM(qty) DESC')
                    ->limit(5)
                    ->get();
        // dd($bestseller);
        $discountitems=DB::table('items')
                            ->where('discount','!=', null )
                            ->inRandomOrder()
                            ->limit(5)
                            ->get();

        // $flash_sale_items=DB::table('items')
        //                     ->orderBy('created_at', 'desc')
        //                     ->get();
        $new_arrival_items=DB::table('items')
                            ->orderBy('created_at', 'desc')
                            ->get();

        $fresh_items=DB::table('items')
                            ->where('subcategory_id','=',1)
                            ->limit(5)
                            ->get();

        return view('frontend.index',compact('items','subcategories','categories','brands','discountitems','new_arrival_items','fresh_items','bestseller_items'));
    }

    public function detail($id)
    {
        $categories = Category::all();
        $brands=Brand::all();
        $items=Item::find($id);
        $subcategories = Subcategory::all();
        $sub_id =$items->subcategory_id;
        $related_items = DB::table('items')
                            ->where('subcategory_id','=', $sub_id)
                            ->limit(5)
                            ->get();

        return view('frontend.detail',compact('items','brands','related_items','subcategories','categories'));


        
    }

    // public function quick_view(Request $request)
    // {
    //     DB::transaction(function () use ($request){
    //         $id = $request->id;
    //         $item_details = Item::find($id);
    //         return view('frontend.index',compact('item_details'));
    //     });

        
    // }

    public function cart()
    {
        $categories = Category::all();
        $brands=Brand::all();
        $subcategories = Subcategory::all();
        return view('frontend.cart',compact('brands','subcategories','categories'));
    }

    public function checkout()
    {
        $brands=Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('frontend.checkout',compact('brands','subcategories','categories'));
    }

    public function about_us()
    {

        return view('frontend.about_us');
    }

    public function shop($id)
    {   
        $brand_name=Brand::find($id);
        $brand_items=Item::where('brand_id', $id)->get();
        $brands=Brand::all();
        $sub_info=Subcategory::find($id);
        $sub_cate_id=$sub_info->category_id;
        $cate_info=Category::find($sub_cate_id);
        $categories= Category::all();
        $subcategories = Subcategory::all();
        $bestseller_items= DB::table('item_order')->groupBy('item_id')->orderByRaw('SUM(qty) DESC')->limit(4)->get();
        $all_item=Item::all();
        $items = DB::table('items')
                    ->where('subcategory_id','=', $id)
                    ->get();
        return view('frontend.shop',compact('all_item','bestseller_items','items','categories','subcategories','sub_info','cate_info','brands','brand_items','brand_name'));
    }

    public function brand_shop($id)
    {   
        $brand_name=Brand::find($id);
        $brand_items=Item::where('brand_id', $id)->get();
        $items = Item::all();
        $brands=Brand::all();
        $bestseller_items= DB::table('item_order')->groupBy('item_id')->orderByRaw('SUM(qty) DESC')->limit(4)->get();
        $categories= Category::all();
        $subcategories = Subcategory::all();
        
        return view('frontend.brand_shop',compact('items','bestseller_items','categories','subcategories','brands','brand_items','brand_name'));
    }

    public function shops(Request $request)
    {
        // if($request){

        $data=$request->search;
        $search_data=DB::table('items')->where('name','like','%'.$data.'%')->get();
        $bestseller_items= DB::table('item_order')->groupBy('item_id')->orderByRaw('SUM(qty) DESC')->limit(4)->get();
                    // ->havingRaw('SUM(qty)>?',[5])
        $items = Item::all();
        $brands=Brand::all();
        $categories= Category::all();
        $subcategories = Subcategory::all();
        return view('frontend.shops',compact('items','search_data','categories','subcategories','brands','bestseller_items'));

        // }else{
        //     $items = Item::all();
        //     $brands=Brand::all();
        //     $categories= Category::all();
        //     $subcategories = Subcategory::all();
        //     return view('frontend.shops',compact('items','categories','subcategories','brands'));
        // }
        
    }

    public function contact()
    {
        $brands=Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('frontend.contact',compact('brands','subcategories','categories'));
    }

    public function ordersuccess()
    {
        $brands=Brand::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('frontend.ordersuccess',compact('brands','subcategories','categories'));
    }
}
