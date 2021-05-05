<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cekResi extends Controller
{
    //
    public function index()
    {
        //join novels and users
        return view('cekResi.index');
    }
}
