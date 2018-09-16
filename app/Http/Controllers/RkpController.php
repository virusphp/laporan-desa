<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renja;
use DB;

class RkpController extends Controller
{
    //
	public function index()
	{
		// $data = base64_decode(config('laporan.api.satu'));
		$kecamatan = DB::table('smas_rkpdes')->pluck('nama_kecamatan','kd_kec')->all();
		return view('rkp.index', compact('kecamatan'));
	}	

	public function apiRKP()
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
