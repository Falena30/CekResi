@extends('layouts.app')

@section('content')
<div class="col-md-8 col-sm-12 bg-white p-4">
    <form action="/home/edit/{{$novel->id}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label>Judul Novel</label>
            <input type="text" class="form-control" name="judul"value="{{$novel->judul}}">
        </div>
        <div class="form-group">
            <label>Cover</label>
            <input type="file" class="form-control-file" name="file">
        </div>
        <div class="form-group">
            <label>Penulis Novel</label>
            <input type="text" class="form-control" name="penulis" value="{{$novel->pengarang}}">
        </div>
        <div class="form-group">
            <label>Sinopsis Novel</label>
            <textarea name="sinopsis" class="form-control" rows="15">{{$novel->sinopsis}}</textarea>
        </div>
</div>
@endsection

@section('sidebar')
<div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
    <div class="form-group">
        <input type="submit" class="form-control btn btn-primary" value="Edit">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
    </div>
</div>
</form> 
@endsection