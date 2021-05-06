<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class CekResiModels extends Model
{
    use HasFactory;
    public static function getApiCekResi($courier,$awb){
        $kurir = $courier;
        $awb = $awb;
        $api_key = '9421cc74f5eeb586f785529d0cceced18f3fe226f7fc18b549c5ad84ef24b328';
        $response = Http::get('https://api.binderbyte.com/v1/track?api_key='.$api_key.'&courier='.$kurir.'&awb='.$awb.'')
                            ->json();
        return $response;
    }
}
