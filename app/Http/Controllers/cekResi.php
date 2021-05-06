<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CekResiModels;

class cekResi extends Controller
{
    //
    public function index(Request $request)
    {
        $jsondata = CekResiModels::getApiCekResi('pos','18022470553');
        $sortedArr = collect($jsondata['data']['history'])->sortBy('date')->all();
        return view('cekResi.index', ['summarys'=>$jsondata['data']['summary'],'details'=>$jsondata['data']['detail'],'historys'=>$sortedArr]);
    }
}
