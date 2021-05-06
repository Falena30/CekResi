@extends('layouts.cekResi')

@section('content')
<div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4">
    <form>
        <div class="form-group">
            <label for="controlSelect">Nomer Resi</label>
            <input type="text" class="form-control" id="awb"  name="awb" placeholder="Nomer Resi">
        </div>
        <div class="form-group">
          <label for="controlSelect">Pilih Kurir</label>
          <select class="form-control" id="courier" name="courier">
            <option value selected hidden>Pilih Kurirnya</option>
            <option>JNE</option>
            <option>TIKI</option>
            <option>POS</option>
            <option>SiCepat</option>
            <option>AntarAja</option>
            <option>Ninja</option>
            <option>JNT</option>
        </select>
        </div>
        <button type="button" class="btn btn-primary" id="search-button">Cari</button>
      </form>
      <hr>
      <div class="row" id="resi-status"></div>
      
</div>   
@endsection

@section('detail')
    <div class="col-md-8 col-sm-12 bg-white p-4">
      <table class="table table-sm">
        <thead>
            <tr>
              <th class="text-center" colspan="4">Delivered to {{$details['receiver']}}, {{$details['destination']}}, {{$historys[0]['date']}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Nomer Resi</th>
                <th>Tanggal Pengiriman</th>
                <th>Pengirim</th>
                <th>Penerima</th>
            </tr>
            <tr>
                <td>{{$summarys['awb']}}</td>
                <td>{{$summarys['date']}}</td>
                <td>{{$details['shipper']}}</td>
                <td>{{$details['receiver']}}</td>
            </tr>
            <tr>
              @if ($summarys['courier']!="")
                <td colspan="2">Courier Terpilih</td>
              @else
                <td colspan="2">Courier tidak terpilih</td>
              @endif
                <td>{{$details['origin']}}</td>
                <td>{{$details['destination']}}</td>
            </tr>
            <tr>
              @if ($summarys['service']!="")
                <td colspan="4">Service Terpilih</td>
              @else
                <td colspan="4">Service tidak terpilih</td>
              @endif
            </tr>
        </tbody>
    </table>
    <table class="table table-sm">
        <thead>
            <tr>
              <th colspan="2">Detail Pengiriman</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <th>Tanggal/Waktu</th>
              <th>Deskribsi</th>
            </tr>
            @foreach ($historys as $history)
            <tr>
              <td>{{$history['date']}}</td>
              <td>{{$history['desc']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection