<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->ajax()){
            $query = $request->searchdata;

            $data=DB::table('items')->where('name','like','%'.$query.'%')
                    ->orWhere('description','like','%'.$query.'%')
                    ->get();

            return response()->json($data);
        }
    }
}
