<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ApiConnect extends Model
{
    use HasFactory;
    public static function getDataFromApi($url){
        $response = Http::get($url)->json();
        return $response;
    }
    public static function sortDataApiCorona($sortColumn,$jsonData){
        if ($sortColumn == 'Provinsi'){
            $jsondatasort = collect($jsonData)
                        ->sortByDesc(function($items){
                            return $items['attributes']['Provinsi'];
                        });
        }
        elseif($sortColumn == 'Kasus_Posi'){
            $jsondatasort = collect($jsonData)
                        ->sortByDesc(function($items){
                            return $items['attributes']['Kasus_Posi'];
                        });
        }elseif($sortColumn == 'Kode_Provi'){
            $jsondatasort = collect($jsonData)
                        ->sortByDesc(function($items){
                            return $items['attributes']['Kasus_Posi'];
                        });
        }elseif($sortColumn == 'Kasus_Meni'){
            $jsondatasort = collect($jsonData)
                        ->sortByDesc(function($items){
                            return $items['attributes']['Kasus_Posi'];
                        });
        }elseif($sortColumn == 'Kasus_Semb'){
            $jsondatasort = collect($jsonData)
                        ->sortByDesc(function($items){
                            return $items['attributes']['Kasus_Posi'];
                        });
        }else{
            return $jsondatasort = null;
        }
        return $jsondatasort;
    }
}
