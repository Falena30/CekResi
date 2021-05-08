@extends('layouts.cekResi')

@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <div id="content">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr class="text-center bg-primary text-light" >
                        <th>Kode Provinsi</th>
                        <th>Provinsi</th>
                        <th>Kasus Positif</th>
                        <th>Kasus Sembuh</th>
                        <th>Kasus Meninggal</th>
                    </tr>  
                </thead>
                <tbody> 
                    @if ($datas != null)
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{$data['attributes']['Kode_Provi']}}</td>
                        <td>{{$data['attributes']['Provinsi']}}</td>
                        <td>{{$data['attributes']['Kasus_Posi']}}</td>
                        <td>{{$data['attributes']['Kasus_Semb']}}</td>
                        <td>{{$data['attributes']['Kasus_Meni']}}</td>
                    </tr>
                    @endforeach
                    @else
                    <h1>Kolom Tidak dapat ditemukan</h1>
                    @endif
                    
                </tbody>
            </table>
            <hr>
        </div>
    </div>
@endsection