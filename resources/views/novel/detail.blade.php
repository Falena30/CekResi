@extends('layouts.app')

@section('content')
    <div class="col-sm-12 bg-white p-4">
        <h1 class="text-center">{{$novels->judul}}</h1>
        <img width="300px" height="300px" src="{{ url('/cover/'.$novels->cover) }}" class="rounded mx-auto d-block" alt="cover">
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        Pengarang
                    </th>
                    <td>
                        {{$novels->pengarang}}
                    </td>
                </tr>
                <tr>
                    <th>
                       Sinopsis 
                    </th>
                    <td>
                        {{$novels->sinopsis}}
                    </td>
                </tr>
                <tr>
                    <th>
                       Penerjemah 
                    </th>
                    <td>
                        {{$novels->name}}
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        Chapter dan volume
                    </th>
                    <td>
                        judul chapter
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection