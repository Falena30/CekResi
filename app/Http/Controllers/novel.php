<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class novel extends Controller
{
    //
    public function index(){
        //join novels and users
        $novels = DB::table('novel_db')
                        ->join('users', 'novel_db.User_Id', '=', 'users.id')
                        ->select('novel_db.*', 'users.name')
                        ->get();
        return view('novel.list',['novels'=>$novels]);
    }
    public function detail($id){
        $novels = DB::table('novel_db')
                        ->where('novel_db.id',$id)
                        ->join('users', 'novel_db.User_Id', '=', 'users.id')
                        ->select('novel_db.*', 'users.name')
                        ->first();
        return view('novel.detail',['novels'=>$novels]); 
    }
}
