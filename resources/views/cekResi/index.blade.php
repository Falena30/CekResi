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
      <table class="table">
        <thead>
            <tr>
              <th>Delivered to {{$details['receiver']}}, {{$details['origin']}},{{$historys[0]['date']}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Nomer Resi</th>
                <td>{{$summarys['awb']}}</td>
            </tr>
            <tr>
                <th>Kurir</th>
                <td>{{$summarys['courier']}}</td>
            </tr>
            <tr>
                <th>Layanan</th>
                <td>{{$summarys['service']}}</td>
            </tr>
        </tbody>
    </table>
    </div>
@endsection