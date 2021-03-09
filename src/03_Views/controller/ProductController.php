<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product1(){
        return view('product');
    }

    public function hello1(){
        return view('product');
    }

    public function riristorybooks(){
        return view('product')
            ->with('page', 'Riri Story Books')
            ->with('url', 'https://www.educastudio.com/category/riri-story-books');
    }

    public function kolakkidssongs(){
        return view('product')
            ->with('page', 'Kolak Kids Songs')
            ->with('url', 'https://www.educastudio.com/category/kolak-kids-songs');

    }

    
}
