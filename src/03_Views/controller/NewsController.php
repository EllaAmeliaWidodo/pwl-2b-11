<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function article($id){
        echo "Halaman artikel $id";
    }

    public function news(){
        return view('news')
            ->with('page', 'Halaman News')
            ->with('url', 'https://www.educastudio.com/news');
    }

    public function newsString($string){
        return view('news')
            ->with('url', 'https://www.educastudio.com/news');
    }
}