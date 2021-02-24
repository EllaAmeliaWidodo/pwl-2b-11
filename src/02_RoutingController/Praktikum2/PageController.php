<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function Home()
    {
    return 'Selamat Datang';
    }
    public function about()
    {
    return '1941720047, Ella Amelia W';
    }
    public function articles()
    {
    return 'artikel';
    }

}
