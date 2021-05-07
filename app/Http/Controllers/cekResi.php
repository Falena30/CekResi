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
        $courier = $request->input('courier');
        $awb = $request->input('awb');
        $jsondata = CekResiModels::getApiCekResi($courier,$awb);

        $ada = true;
        if ($courier != null && $awb != null){    
            $sortedArr = collect($jsondata['data']['history'])->sortBy('date')->all();
            return view('cekResi.index', ['summarys'=>$jsondata['data']['summary'],'details'=>$jsondata['data']['detail'],'historys'=>$sortedArr,'ada'=>$ada]);
        }else{
            $ada = false;
            return view('cekResi.index',['ada'=>$ada]);
        }
    }
}
