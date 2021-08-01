<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $roles = Auth::user()->getRoleNames();
        // dd($roles);
        if($roles[0] == 'admin'){
            return redirect()->route('category.index');
        }else{
            return redirect()->route('index');
        }
        
    }
}
