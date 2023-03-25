<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class makananIndexController extends Controller
{
    public function index()
    {
    	$makanan = DB::table('makanan')->select()->join('jenis_makanan','jenis_makanan.id_jenis','=','makanan.id_jenis')->paginate(10);

    	return view('makananIndex',['makanan' => $makanan]);

    }
    public function tambah(request $req){
	  	DB::table('makanan')->insert([
	    	'nama_makanan'=>request('frm_nama'),
	    	'harga_makanan'=>request('frm_harga'),
	    	'status_makanan'=>request('frm_status'),
	    	'id_jenis'=>request('frm_jen')	
	    ]);
    return redirect('/makananIndex');
    }
}