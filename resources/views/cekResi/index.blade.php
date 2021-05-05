@extends('layouts.cekResi')

@section('content')
<div class="row">
    <form>
        <div class="form-group">
            <label for="controlSelect">Nomer Resi</label>
            <input type="email" class="form-control"  placeholder="Nomer Resi">
        </div>
        <div class="form-group">
          <label for="controlSelect">Pilih Kurir</label>
          <select class="form-control" id="courier_input">
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