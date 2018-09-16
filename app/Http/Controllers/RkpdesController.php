<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class RkpdesController extends Controller
{
    public function index()
	{
		$kecamatan = DB::table('smas_rkpdes')->pluck('nama_kecamatan','kd_kec')->all();
		return view('rkpdes.index', compact('kecamatan'));
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

	public function reportRkpDes(Request $request)
	{
		$tahun = $request->tahun;
		$list = DB::table('smas_rkpdes')->where(function($query) use ($request) {
			$query->where('kd_kec', $request->kd_kec)
				->where('kd_desa', $request->kd_desa);
		})->groupBy('kabupaten')->get();
		
		$nama_bidang = DB::table('smas_rkpdes')->select(DB::raw('count(nama_bidang) as jlhnama_bidang , nama_bidang' ))->where(function($query) use ($request) {
			$query->where('kd_kec', $request->kd_kec)
				->where('kd_desa', $request->kd_desa);
		})->groupBy('nama_bidang')->get();

		//ini di joinkan kalau di joinkan datanya samapai ribauan
		// $data = DB::table('smas_rkpdes')
        // ->join('v_desa', function ($join) use ($request) {
        //     $join->on('smas_rkpdes.kd_desa', '=', 'v_desa.kd_desa')
        //          ->where('v_desa.kd_desa', $request->kd_desa);
        // })
		// ->get();
		$data = DB::table('smas_rkpdes')->where(function($query) use ($request) {
			$query->where('kd_kec', $request->kd_kec)
				->where('kd_desa', $request->kd_desa);
		})->get();
		$pdf = PDF::loadView('rkpdes.reportrkpdes', compact('tahun', 'data', 'list', 'nama_bidang'));
		
         return $pdf->setPaper('legal', 'landscape')->download($tahun.'.pdf');
		//return view('rkpdes.reportrkpdes', compact('tahun', 'data', 'list', 'nama_bidang'));
	}
}
