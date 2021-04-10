<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\index;
use App\Models\User;

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
        $user = User::all();
        // return $user;
        return view('home', compact('user'));
        //    return view('auth.login');
    }
    public function product()
    {
        return view('product');
    }
    public function news()
    {
        return view('news');
    }
    public function program()
    {
        return view('program');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
}
