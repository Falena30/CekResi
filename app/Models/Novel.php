<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Novel extends Model
{
    use HasFactory;
    protected $table = 'novel_db';
    protected $fillable = ['judul','cover','pengarang','sinopsis'];

    //fungsi untuk image
    public static function postImage($request,$name,$destination){
        
        //simpan data filenya kedalam variabel
        $file = $request->input($name);
        //simpan nama filenya kedalam variabel
        $nama_file = $request->file($name)->getClientOriginalName();
        //tentukan tujuan file untuk simpan
        $tujuan_file = public_path() . $destination;
        $request->file($name)->move($tujuan_file, $nama_file);
        return $nama_file;
    }

    public static function insertQueryNovel($judul,$cover,$pengarang,$sinopsis,$userID){
        DB::table('novel_db')->insert([
            'id'=>null,
            'judul'=>$judul,
            'cover'=>$cover,
            'pengarang'=>$pengarang,
            'sinopsis'=>$sinopsis,
            'User_Id'=>$userID
        ]);
    }

}
