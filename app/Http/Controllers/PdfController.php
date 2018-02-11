<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    //

	// Generate PDF
	public function reportRKP()
	{
		$data = $this->decodeApi(config('laporan.api.satu'));
		$laporan = $this->selectRKP($data);
//		$pdf = PDF::loadView('pdf.pdf', compact('laporan'))->setPaper('letter', 'landscape');
//		header("Content-type:application/json");
//		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
//		return view('welcome', compact('data'));
//		return $pdf->stream('laporan.pdf');
		return view('pdf.reportRKP',compact('laporan'));
		
	}

	public function reportRPJ()
	{
		$data = $this->decodeApi(config('laporan.api.dua'));
		$laporan = $this->selectRPJ($data);
//		$pdf = PDF::loadView('pdf.pdf', compact('laporan'))->setPaper('letter', 'landscape');
//		header("Content-type:application/json");
//		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
//		return view('welcome', compact('data'));
//		return $pdf->stream('laporan.pdf');
		return view('pdf.reportRPJ',compact('laporan'));
		
	}

	public function reportAPBD()
	{
		$data = $this->decodeApi(config('laporan.api.tiga'));
		$laporan = $this->selectAPBD($data);
//		$pdf = PDF::loadView('pdf.pdf', compact('laporan'))->setPaper('letter', 'landscape');
		header("Content-type:application/json");
		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
//		return view('welcome', compact('data'));
//		return $pdf->stream('laporan.pdf');
//		return view('pdf.reportAPBD',compact('laporan'));
		
	}

	private function decodeApi($value)
	{
		return file_get_contents(base64_decode($value));
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
		return $laporan = $dataApi;
	}

	private function selectRKP($value)
	{
		$dataDecode = json_decode($value, true);
		$dataApi = array();
		foreach($dataDecode as $key => $val) {
			$key1 = $val['nama_kecamatan'];
			$key2 = $val['nama_desa'];
			$key3 = $val['kd_bid'];
			$key4 = $val['nama_bidang'];
			unset($val['nama_kecamatan'], $val['nama_desa'],$val['kd_bid'], $val['nama_bidang']);
			$dataApi[$key1][$key2][$key3][$key4][] = $val;
		}
		return $laporan = $dataApi;
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
		return $laporan = $dataApi;
	}
}
