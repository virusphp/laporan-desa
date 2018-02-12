<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RPJ;
use DB;

class RpjController extends Controller
{
    //
	public function index()
	{
		$tahun = DB::table('smas_rpjmdes')->pluck('tahun','tahun')->all();
		return view('rpj.index', compact('tahun'));
	}	

	public function apiRPJ()
	{
		return response()->json(DB::table('smas_rpjmdes')->get());
	}

	public function getKecamatan(Request $request)
	{
		if($request->ajax()) {
			$kecamatan = DB::table('smas_rpjmdes')->where('tahun',$request->tahun)->pluck('nama_kecamatan','kd_kec')->all();
			$data = view('dropdown.ajax-kecamatan',compact('kecamatan'))->render();
			return response()->json(['options' => $data]);
		}	
	}

	public function getDesa(Request $request)
	{
		if($request->ajax()) {
			$desa = DB::table('smas_rpjmdes')->where(function($query) use ($request){
					$query->where('tahun',$request->tahun)
					->where('kd_kec',$request->kd_kec);
			})->pluck('nama_desa','kd_desa')->all();
			$data = view('dropdown.ajax-desa',compact('desa'))->render();
			return response()->json(['options' => $data]);
		}	
	}


}
