<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutus() {
        return view ('about-us')
        ->with ('url', 'https://www.educastudio.com/about-us');
    }
}
