@extends('layouts.cekResi')

@section('content')
<div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4">
    <form ction="/index" method="get">
      @csrf
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
        <div class="form-group">
          <button class="btn btn-primary" type="submit"  aria-expanded="false" id="reloader" aria-controls="collapseExample">
            Cari
          </button>
          <script type="text/javascript">
              $("#reloader").click(function(){
                $("#content").load(" #content");
              })
          </script>
          </div>
      </form>
      @if ($ada == false && $pencarian == true)
          <p class="text-danger">{{$pesan}}</p> 
      @endif
      <hr>
      @if ($ada == true) 
      <h3 class="card-header">Respone Toko</h3>
      <div class="card-body">
        <p class="card-text">Lama Waktu : {{$full}}</p>
        <div style="height:120px !important">
          <div class="form-group">
            <button class="btn btn-success">{{$kesan}}</button>
          </div>
        </div>
       </div> 
      @endif  
</div>
@endsection

@section('detail')
    
      @if ($ada == true)
      <div class="col-md-8 col-sm-12 bg-white p-4">
        <div id="content">
        <table class="table table-sm table-bordered">
          <thead>
              <tr>
                <th class="text-center bg-success text-light" colspan="4">Delivered to {{$details['receiver']}}, {{$details['destination']}}, {{$historys[0]['date']}}</th>
              </tr>
          </thead>
          <tbody>
              <tr class="text-center bg-primary text-light" >
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
        <hr>
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="text-center bg-success text-light">
                  <th colspan="2">Detail Pengiriman</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-primary text-light text-center ">
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
    </div>
      @endif
    
@endsection