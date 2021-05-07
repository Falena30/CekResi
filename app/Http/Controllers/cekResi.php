<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CekResiModels;
use DateTime;

class cekResi extends Controller
{
    //
    
    public function index(Request $request)
    {
        $courier = $request->input('courier');
        $awb = $request->input('awb');
        $jsondata = CekResiModels::getApiCekResi($courier,$awb);

        $ada = true;
        if ($jsondata['status'] == 200){    
            $sortedArr = collect($jsondata['data']['history'])->sortBy('date')->all();
            $fdate = end($sortedArr);
            $ldate = prev($sortedArr);
            $dateTime1 = new DateTime($fdate['date']);
            $dateTime2 = new DateTime($ldate['date']);
            $interval = $dateTime1->diff($dateTime2);
            $fullinterval = $interval->h.' jam'.$interval->i.' menit';
            $hours = $interval->format('%h');
            if(count($sortedArr) == 1){
                $kesan = "Proses pengemasan oleh toko";   
            }else{
                if ($hours <= 4){
                    $kesan = "sangat baik";
                }elseif($hours > 4 && $hours <= 8){
                    $kesan = "Baik";
                }else{
                    $kesan = "Cukup";
                }
            }
            return view('cekResi.index', ['summarys'=>$jsondata['data']['summary'],'details'=>$jsondata['data']['detail'],'historys'=>$sortedArr,'ada'=>$ada,'kesan' => $kesan,'full'=>$fullinterval]);
        }else{
            $pesan = "Nomer Resi Tidak Ditemukan";
            $ada = false;
            return view('cekResi.index',['ada'=>$ada,'pesan'=>$pesan]);
        }
    }
}
