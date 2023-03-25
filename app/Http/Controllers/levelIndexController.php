<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class levelIndexController extends Controller
{
    public function index()
    {
    	$level = DB::table('level')->get();

    	return view('levelIndex',['level' => $level]);

    }
    public function tambah(request $req){
        DB::table('level')->insert([
            'id_level'=>request('frm_id'),
            'nama_level'=>request('frm_nama')  
        ]);
    return redirect('/levelIndex');
    }
    public function ubah(request $request){
        DB::table('level')->where('id_level',$request->id_level)->update([
            'nama_level'=>$request->nama_level
        ]);
    return redirect('/levelIndex');
    }
    public function tampilDataLevel($id_level){
        $dataEdit = DB::table('level')->where('id_level',$id_level)->first();
    return view("/levelIndex",['dataEdit'=>$dataEdit]);

    }
    public function ambilajax($id_level){
        $dataEdit = DB::table('level')->where('id_level',$id_level)->first();
    return response()->json($dataEdit);
    }
}