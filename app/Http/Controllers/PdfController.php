<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Renja;
use App\RPJ;
use App\RPBD;
use DB;

class PdfController extends Controller
{
    //

	// Generate PDF
	public function reportRKP(Request $request)
	{
		// dd($request->all());
		// $data = Renja::select("*")->get();
		// $data = DB::table('smas_rkpdes')->where(function($query) use ($request) {
		// 	$query->where('kd_kec',$request->kd_kec)
		// 		->where('kd_desa',$request->kd_desa);
		// })->get();
		$data = DB::table('v_desa as v')
			->select('v.jbt_kades','v.nm_kades','s.*')
			->join('smas_rkpdes as s', function($join) {
				$join->on('v.kd_kec','=','s.kd_kec')
					->on('v.kd_desa','=','s.kd_desa');
			})
			->where([['v.id_smas_desa', '=', $request->id_smas_desa],['v.id_smas_kecamatan','=',$request->id_smas_kecamatan]])
			->get();

		// $data = $this->decodeApi(config('laporan.api.satu'));
		$laporan = $this->selectRKP($data);
		// dd($laporan);
		// $pdf = PDF::loadView('pdf.reportRKP', compact('laporan'))->setPaper('f4', 'landscape');
//		header("Content-type:application/json");
//		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
		// return $pdf->stream('laporan.pdf');
		return view('pdf.reportRKP',compact('laporan'));
		
	}

	public function reportRKPP(Request $request)
	{
//		$data = Renja::select("*")->get();
		// $data = DB::table('smas_rkpdes')->where(function($query) use ($request) {
		// 	$query->where('kd_kec',$request->kd_kec)
		// 		->where('kd_desa',$request->kd_desa);
		// })->get();
		$data = DB::table('v_desa as v')
			->select('v.jbt_kades','v.nm_kades','s.*')
			->join('smas_rkpdes as s', function($join) {
				$join->on('v.kd_kec','=','s.kd_kec')
					->on('v.kd_desa','=','s.kd_desa');
			})
			->where([['v.id_smas_desa', '=', $request->id_smas_desa],['v.id_smas_kecamatan','=',$request->id_smas_kecamatan]])
			->get();
		// $data = $this->decodeApi(config('laporan.api.satu'));
		$laporan = $this->selectRKP($data);
		// dd($laporan);
//		$pdf = PDF::loadView('pdf.reportRKP', compact('laporan'))->setPaper('letter', 'landscape');
//		header("Content-type:application/json");
//		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
//		return $pdf->stream('laporan.pdf');
		return view('pdf.reportRKPP',compact('laporan'));
		
	}

	public function reportRPJ(Request $request)
	{
		$data = DB::table('smas_rpjmdes')->where(function($query) use ($request) {
			$query->where('tahun', $request->tahun)
				->where('kd_kec', $request->kd_kec)
				->where('kd_desa', $request->kd_desa);
		})->get();
		// $data = $this->decodeApi(config('laporan.api.dua'));
		$laporan = $this->selectRPJ($data);
//		$pdf = PDF::loadView('pdf.pdf', compact('laporan'))->setPaper('letter', 'landscape');
//		header("Content-type:application/json");
//		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
//		return view('welcome', compact('data'));
//		return $pdf->stream('laporan.pdf');
		return view('pdf.reportRPJ',compact('laporan'));
		
	}

	public function reportAPBD(Request $request)
	{
		$data = DB::table('smas_apbdes')->where(function ($query) use ($request) {
			$query->where('tahun', $request->tahun)
				->where('kd_kec', $request->kd_kec)
				->where('kd_desa', $request->kd_desa);
		})->get();
		$dds = DB::table('smas_anggaran')->where(function($query) use ($request) {
			$query->where('tahun', $request->tahun)
				->where('kd_kec', $request->kd_kec)
				->where('kd_desa', $request->kd_desa);
		})->first();
		$modal = DB::table('smas_penyertaanmodal')->where(function($query) use ($request) {
			$query->where('tahun', $request->tahun)
				->where('kd_kec', $request->kd_kec)
				->where('kd_desa', $request->kd_desa);
		})->first();
		// dd($request->all());
		// $data = $this->decodeApi(config('laporan.api.tiga'));
		$laporan = $this->selectAPBD($data);
		// dd($laporan);
//		$pdf = PDF::loadView('pdf.pdf', compact('laporan'))->setPaper('letter', 'landscape');
//		header("Content-type:application/json");
//		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
//		return view('welcome', compact('data'));
//		return $pdf->stream('laporan.pdf');
		return view('pdf.reportAPBD',compact('laporan','dds','modal'));
		
	}

	private function selectAPBDbackup($value)
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
			$key6 = $val['nama_kegiatan'];
			$key7 = $val['jumlahanggaran'];
			unset($val['tahun'],$val['nama_kecamatan'], $val['nama_desa'],$val['jumlahanggaran'],$val['kd_bid'],$val['nama_kegiatan'], $val['nama_bidang']);
			$dataApi[$key1][$key2][$key3][$key4][$key5][$key6][$key7][] = $val;
		}
//		return $dataDecode;
		return $dataApi;
	}


	private function selectRKP($value)
	{
		$dataDecode = json_decode($value, true);
		$dataApi = array();
		foreach($dataDecode as $key => $val) {
			$key1 = $val['jbt_kades'];
			$key2 = $val['nm_kades'];
			$key3 = $val['nama_kecamatan'];
			$key4 = $val['nama_desa'];
			$key5 = $val['kd_bid'];
			$key6 = $val['nama_bidang'];
			unset($val['jbt_kades'],$val['nm_kades'],$val['nama_kecamatan'], $val['nama_desa'],$val['kd_bid'], $val['nama_bidang']);
			$dataApi[$key1][$key2][$key3][$key4][$key5][$key6][] = $val;
		}
		return $dataApi;
	}
	
	private function selectRPJ($value)
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
		return $dataApi;
	}
	
	private function decodeApi($value)
	{
		return file_get_contents(base64_decode($value));
	}

}
