<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Novel;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //join novels and users
        $novels = DB::table('novel_db')
                        ->join('users', 'novel_db.User_Id', '=', 'users.id')
                        ->select('novel_db.*', 'users.name')
                        ->get();
        return view('user.dashbord',['novels'=>$novels]);
    }

    public function user_index(){
        return view('user.userdashbord');
    }

    public function deleteNovel($id){
        DB::table('novel_db')
            ->where('id',$id)
            ->delete();

        return redirect()->back(); 
    }

    public function getEdit($id){
        //$novel = DB::table('novel_db')->where('id','=',$id)->get();
        //$novel = Novel::find($id);
        $novel = DB::table('novel_db')
                ->where('id', '=', $id)
                ->first();
        return view('user.edit', ['novel'=>$novel]);
    }

    public function putEdit(Request $request, $id){
        //lakukan validasi

        //cek file gambarnya    
        
        if($request->hasFile('file')){
            //panggil fungsi post image
            $nama_image = Novel::postImage($request,'file','/cover/');
            DB::table('novel_db')
            ->where('id',$id)
            ->update([
                'judul'=>$request->judul,
                'cover'=>$nama_image,
                'pengarang'=>$request->penulis,
                'sinopsis'=>$request->sinopsis,  
            ]);
        }else{
            DB::table('novel_db')
            ->where('id',$id)
            ->update([
                'judul'=>$request->judul,
                'pengarang'=>$request->penulis,
                'sinopsis'=>$request->sinopsis,  
            ]);
        }

        return redirect()->back();
    }

    public function postNovel(Request $novel)
    {
        // $this->validate($novel,[
        //     'judul'=> 'required',
        //     'cover'=> 'required',
        //     'pengarang'=> 'required',
        //     'sinopsis'=> 'required'
        // ]);

        //tampung id dari user
        $userID = Auth::user()->id;

        if($novel->hasFile('file')){
            $nama_image = Novel::postImage($novel,'file','/cover/');
            Novel::insertQueryNovel(
                $novel->judul,
                $nama_image,
                $novel->penulis,
                $novel->sinopsis,
                $userID
            );
        }else{
            Novel::insertQueryNovel(
                $novel->judul,
                null,
                $novel->penulis,
                $novel->sinopsis,
                $userID
            );
        }
        
        return redirect()->back(); 
    }
}
