<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiConnect;

class apiCoronaController extends Controller
{
    //
    public function index(){
        $jsondata = ApiConnect::getDataFromApi("https://api.kawalcorona.com/indonesia/provinsi");
        $namaColumn = 'Kode_Provi';
        //jika menggunakan sort
        $jsondatasort = ApiConnect::sortDataApiCorona($namaColumn,$jsondata);
        // $jsondatasort = collect($jsondata)
        //                 ->sortBy(function($items){
        //                     return $items['attributes']['Provinsi'];
        //                 });

        return view("corona.index",['datas'=>$jsondatasort]);
    }
}
