<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article($id) {
        echo "Halaman artikel dengan ID $id";
    }
    
    public function news(){
        return view('article')
            ->with ('url', 'https://www.educastudio.com/news');
    }

    public function newsString($string){
        return view ('article')
            ->with ('url', 'https://www.educastudio.com/news/' . $string);
    }
}
