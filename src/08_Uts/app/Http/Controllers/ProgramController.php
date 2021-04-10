<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function karir() {
        return view ('program')
            ->with ('page', 'Program : Karir')
            ->with ('url', 'https://www.educastudio.com/program/karir');
    }
}