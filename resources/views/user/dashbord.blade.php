@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-sm-12 bg-white p-4">
        <form action="/home/add" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label>Judul Novel</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul Novel">
            </div>
            <div class="form-group">
                <label>Cover</label>
                <input type="file" class="form-control-file" name="file" placeholder="Cover">
            </div>
            <div class="form-group">
                <label>Penulis Novel</label>
                <input type="text" class="form-control" name="penulis" placeholder="Penulis Novel">
            </div>
            <div class="form-group">
                <label>Sinopsis Novel</label>
                <textarea name="sinopsis" class="form-control" rows="15"></textarea>
            </div>
    </div>
@endsection

@section('sidebar')
    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" value="Upload">
        </div>
    </div>
</form> 
@endsection


@section('novel')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Judul Novel</th>
                <th width="1%">Cover</th>
                <th >Pengarang</th>
                <th >Sinopsis</th>
                <th >Penerjemah</th>
                <th width="1%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($novels as $novel)
            <tr>
                <td>{{$novel->judul}}</td>
                <td><img width="150px" src="{{ url('/cover/'.$novel->cover) }}"></td>
                <td>{{$novel->pengarang}}</td>
                <td> 
                    <p>
                        {{$novel->sinopsis}}
                    </p>  
                </td>
                <td>{{$novel->name}}</td>
                <td>
                    <form action="/home/delete/{{$novel->id}}" method="post">
                        <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                    </form>
                    <a class="btn btn-warning" href="/home/edit/{{$novel->id}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection