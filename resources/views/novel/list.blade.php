@extends('layouts.app')

@section('content')
    @foreach($novels as $novel)
        <div class="col-md-4 col-sm-12 mt-4">
            <div class="card">
                <img width="300px" height="300px" class="card border-primary mb-3 mx-auto" style="max-width: 30rem;" src="{{ url('/cover/'.$novel->cover) }}" alt="Cover">
                <div class="card-body card border-success mb-3">
                    <table class="table card-body card border-success mb-3">
                        <tbody>
                            <tr>
                                <th scope="row">Judul</th>
                                <td>
                                    <h5 class="card-title">{{$novel->judul}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Pengarang</th>
                                <td>
                                    <p class="card-text card-body">{{$novel->pengarang}}</p>
                                </td>
                            </tr>
                            
                        </tbody>
                        
                    </table>
                    <a href="/novel/detail/{{ $novel->id }}" class="btn btn-primary">Baca Novel</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection