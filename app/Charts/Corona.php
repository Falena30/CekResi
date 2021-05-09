<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\ApiConnect;
use Illuminate\Support\Facades\Http;

class Corona extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */

    public function handler(Request $request): Chartisan
    {
        $jsondata       = ApiConnect::getDataFromApi("https://api.kawalcorona.com/indonesia/provinsi");
        $collectJson    = collect($jsondata);
        $labels         = $collectJson->flatten(1)->pluck('Provinsi');
        $dataPositif    = $collectJson->flatten(1)->pluck('Kasus_Posi');
        $dataSembuh     = $collectJson->flatten(1)->pluck('Kasus_Semb');
       // dd($labels);
        return Chartisan::build()
                    ->labels($labels->toArray())
                    ->dataset('Khasus Positif',$dataPositif->toArray())
                    ->dataset('Khasus Sembuh',$dataSembuh->toArray());
    }
}