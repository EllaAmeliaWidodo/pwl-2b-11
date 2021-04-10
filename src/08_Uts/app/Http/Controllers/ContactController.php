<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactus() {
        return view ('contactus')
            ->with ('url', 'https://www.educastudio.com/contact-us');
    }
}