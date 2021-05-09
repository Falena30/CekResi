<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiConnect;
use App\Charts\Corona;

class apiCoronaController extends Controller
{
    //
    public function index(){
        $jsondata = ApiConnect::getDataFromApi("https://api.kawalcorona.com/indonesia/provinsi");
        $namaColumn = 'Kode_Provi';
        //jika menggunakan sort
        $jsondatasort = ApiConnect::sortDataApiCorona($namaColumn,$jsondata);

        return view("corona.index",['datas'=>$jsondatasort]);
    }

    public function chart(){
        // $jsondata = ApiConnect::getDataFromApi("https://api.kawalcorona.com/indonesia/provinsi");
        // $collectJson = collect($jsondata);
        // $positif   = $collectJson[0]['attributes']['Kasus_Posi'];
        // $meninggal = $collectJson[0]['attributes']['Kasus_Meni'];
        // $sembuh = $collectJson[0]['attributes']['Kasus_Semb'];
        // dd($collectJson[0]);
        // $jsondata = ApiConnect::getDataFromApi("https://api.kawalcorona.com/indonesia/provinsi");
        // $collectJson = collect($jsondata);
        // $flatjson = $collectJson->flatten(1)->pluck('Kasus_Posi');
        // $positif   = $collectJson->flatten(1)->pluck('Kasus_Posi');
        // $meninggal = $collectJson->flatten(1)->pluck('Kasus_Meni');
        // $sembuh = $collectJson->flatten(1)->pluck('Kasus_Semb');
        // dd($flatjson);
        $jsondata = ApiConnect::getDataFromApi("https://api.kawalcorona.com/indonesia/provinsi");
        $collectJson = collect($jsondata);
        $positif = $collectJson->flatten(1)->pluck('Kasus_Posi');
        $provinsi = $collectJson->flatten(1)->pluck('Provinsi');
        $positifDecode = json_decode($positif,true);
        $provinsiDecode = json_decode($provinsi,true);
        //dd($provinsiDecode);
        return view('corona.chart');
    }

}
