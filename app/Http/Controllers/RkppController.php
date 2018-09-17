<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RkppController extends Controller
{
    //
	//
	public function index()
	{
		$kecamatan = DB::table('v_kecamatan')->where('id_kabupaten','=', 'JTGKAB001')->pluck('nama_kecamatan','id_smas_kecamatan')->all();
		return view('rkpp.index', compact('kecamatan'));
	}	

	public function apiRenja()
	{
		return response()->json(DB::table('smas_rkpdes')->get());
	}

	public function getDesa(Request $request)
	{
		if($request->ajax()) {
			$desa = DB::table('v_desa')->where('id_smas_kecamatan',$request->id_smas_kecamatan)->pluck('nama_desa','id_smas_desa')->all();
			$data = view('dropdown.ajax-desa',compact('desa'))->render();
			return response()->json(['options' => $data]);
		}	
	}
	
}
