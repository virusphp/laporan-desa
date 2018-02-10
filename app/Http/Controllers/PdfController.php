<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    //

	// Generate PDF
	public function generatePdf()
	{
		$data = $this->decodeApi(config('laporan.api.satu'));
		$laporan = $this->selectVilage($data);
//		$pdf = PDF::loadView('pdf.pdf', compact('laporan'));
//		header("Content-type:application/json");
//		print json_encode($laporan,  JSON_PRETTY_PRINT);
//		dd($laporan);
//		return $pdf->stream('pdf.pdf');
		return view('pdf.pdf',compact('laporan'));
		
	}

	private function decodeApi($value)
	{
		return file_get_contents(base64_decode($value));
	}
	
	private function selectVilage($value)
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

}
