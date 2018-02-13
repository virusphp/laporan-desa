<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApbdController extends Controller
{

	//
	public function index()
	{
		$tahun = DB::table('smas_apbdes')->pluck('tahun','tahun')->all();
		return view('apbd.index', compact('tahun'));
	}

	public function getKecamatan(Request $request)
	{
		if($request->ajax()) {
			$kecamatan = DB::table('smas_apbdes')->where('tahun',$request->tahun)->pluck('nama_kecamatan','kd_kec')->all();
			$data = view('dropdown.ajax-kecamatan',compact('kecamatan'))->render();
			return response()->json(['options' => $data]);
		}	
	}
	
	public function getDesa(Request $request)
	{
		if($request->ajax()) {
			$desa = DB::table('smas_apbdes')->where(function($query) use ($request){
					$query->where('tahun',$request->tahun)
					->where('kd_kec',$request->kd_kec);
			})->pluck('nama_desa','kd_desa')->all();
			$data = view('dropdown.ajax-desa',compact('desa'))->render();
			return response()->json(['options' => $data]);
		}	
	}



 	public function apiAPBD()
	{
		$data = DB::table('smas_apbdes')->where('tahun', 2018)->get();
		$apbdes = $this->selectAPBD($data);

		return response()->json($apbdes);
	}

	private function selectAPBD($value)
	{
		$dataDecode = json_decode($value, true);
		$dataApi = array();
		foreach($dataDecode as $key => $val) {
			$key1 = $val['tahun'];
			$key2 = $val['nama_kecamatan'];
			$key3 = $val['nama_desa'];
			$key4 = $val['kd_bid'];
			$key5 = $val['nama_bidang'];
			unset($val['tahun'],$val['nama_kecamatan'], $val['nama_desa'],$val['kd_bid'], $val['nama_bidang']);
			$dataApi[$key1][$key2][$key3][$key4][$key5][] = $val;
		}
//		return $dataDecode;
		return $dataApi;
	}
}
