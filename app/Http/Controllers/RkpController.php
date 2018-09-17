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
		$kecamatan = DB::table('v_kecamatan')->where('id_kabupaten','=', 'JTGKAB001')->pluck('nama_kecamatan','id_smas_kecamatan')->all();
		return view('rkp.index', compact('kecamatan'));
	}	

	public function apiRKP()
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
