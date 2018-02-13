<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApbdController extends Controller
{
   //
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
