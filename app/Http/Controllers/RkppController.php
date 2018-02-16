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
		$kecamatan = DB::table('smas_rkpdes')->pluck('nama_kecamatan','kd_kec')->all();
		return view('rkpp.index', compact('kecamatan'));
	}	

	public function apiRenja()
	{
		return response()->json(DB::table('smas_rkpdes')->get());
	}

	public function getDesa(Request $request)
	{
		if($request->ajax()) {
			$desa = DB::table('smas_rkpdes')->where('kd_kec',$request->kd_kec)->pluck('nama_desa','kd_desa')->all();
			$data = view('dropdown.ajax-desa',compact('desa'))->render();
			return response()->json(['options' => $data]);
		}	
	}
	
}
