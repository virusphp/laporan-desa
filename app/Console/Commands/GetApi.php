<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Rencana;
use App\Rpjmdes;

class GetApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ambil:rkp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengambil Semua data api terbaru';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	
		$rpj = $this->decodeApi(config('laporan.api.dua'));
		$this->getRpjm($rpj);

		$rkp = $this->decodeApi(config('laporan.api.satu'));
		$this->getRkp($rkp);
			
    }

	private function getRkp($value)
	{

		$dataRkp = json_decode($value, true);
		if ($dataRkp) {
			$masuk = 0;
			Rencana::truncate();
			foreach($dataRkp as $data) {
				$saveRkp = DB::table('rencanas')->insert([
					'kd_kec' => $data['kd_kec'],
					'nama_kecamatan' => $data['nama_kecamatan'],
					'kd_desa' => $data['kd_desa'],
					'nama_desa' => $data['nama_desa'],
					'kd_bid' => $data['kd_bid'],
					'nama_bidang' => $data['nama_bidang'],
					'kd_keg' => $data['kd_keg'],
					'id_keg' => $data['id_keg'],
					'nama_kegiatan' => $data['nama_kegiatan'],
					'lokasi' => $data['lokasi'],
					'perkiraan_volum' => $data['Perkiraan_Volum'],
					'kd_sas' => $data['kd_sas'],
					'sasaran' => $data['sasaran'],
					'waktu' => $data['waktu'],
					'biaya' => $data['biaya'],
					'kd_sumber' => $data['kd_sumber'],
					'sewa_kelola' => $data['swakelola'],
					'kerjasama' => $data['kerjasama'],
					'pihak_ketiga' => $data['pihak_ketiga'],
					'pelaksana' => $data['pelaksana']
				]);

				if ($saveRkp) {
					$this->info($data['nama_desa']. ' Tersinkron ke database');
					$masuk += 1;
				}
			}

			if ($masuk == 0) {
				$this->comment('tidak ada sincron data baru');
			} else {
				$this->comment($masuk. 'Data tersinkron semua');
			}
		} else {
			$this->info('tidak ada yang disincronkan');
		}
	}

	private function getRpjm($value)
	{

		$dataRpjm = json_decode($value, true);
		if ($dataRpjm) {
			$masuk = 0;
			Rpjmdes::truncate();
			foreach($dataRpjm as $data) {
				$saveRpjm = DB::table('rpjmdes')->insert([
					'tahun' => $data['tahun'],
					'kd_kec' => $data['kd_kec'],
					'nama_kecamatan' => $data['nama_kecamatan'],
					'kd_desa' => $data['kd_desa'],
					'nama_desa' => $data['nama_desa'],
					'kd_bid' => $data['kd_bid'],
					'nama_bidang' => $data['nama_bidang'],
					'kd_keg' => $data['kd_keg'],
					'id_keg' => $data['id_keg'],
					'nama_kegiatan' => $data['nama_kegiatan'],
					'lokasi' => $data['lokasi'],
					'perkiraan_volum' => $data['Perkiraan_Volum'],
					'keluaran' => $data['keluaran'],
					'kd_sas' => $data['kd_sas'],
					'sasaran' => $data['sasaran'],
					'tahun1' => $data['tahun1'],
					'tahun2' => $data['tahun2'],
					'tahun3' => $data['tahun3'],
					'tahun4' => $data['tahun4'],
					'tahun5' => $data['tahun5'],
					'tahun6' => $data['tahun6'],
					'biaya' => $data['biaya'],
					'sumber_dana' => $data['sumberdana'],
					'sewa_kelola' => $data['swakelola'],
					'kerjasama' => $data['kerjasama'],
					'pihak_ketiga' => $data['pihak_ketiga']
				]);

				if ($saveRpjm) {
					$this->info($data['nama_desa']. ' Tersinkron ke database');
					$masuk += 1;
				}
			}

			if ($masuk == 0) {
				$this->comment('tidak ada sincron data baru');
			} else {
				$this->comment($masuk. 'Data tersinkron semua');
			}
		} else {
			$this->info('tidak ada yang disincronkan');
		}

	}
	
	private function decodeApi($value)
	{
		return file_get_contents(base64_decode($value));
	}
}
