<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //
    public function program1(){
        return view ('program');
    }
    public function magang(){
        return view ('program')
            ->with ('page', 'magang')
            ->with ('url', 'https://www.educastudio.com/program/magang');
    }
    public function kunjunganindustri(){
        return view ('program')
            ->with ('page', 'Kunjugan Industri')
            ->with ('url', 'https://www.educastudio.com/program/kunjungan-industri');
    }
}