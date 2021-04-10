<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edugames() {
        return view ('product')
            ->with ('page', 'Marbel Edu Games')
            ->with ('url', 'https://www.educastudio.com/category/marbel-edu-games');
    }
}