<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class GetDDS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ambil:dds';

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
        //
		$dds = $this->decodeApi(config('laporan.api.empat'));
		$this->getDDS($dds);

		$modal = $this->decodeApi(config('laporan.api.lima'));
		$this->getModal($modal);
    }

	private function getDDS($value)
	{
		$dataDDS = json_decode($value, true);
		if ($dataDDS) {
			$masuk = 0;
			DB::table('anggarans')->truncate();
			foreach($dataDDS as $data) {
				$saveDDS = DB::table('anggarans')->insert([
					'tahun' => $data['tahun'],
					'kd_kec' => $data['kd_kec'],
					'nama_kecamatan' => $data['nama_kecamatan'],
					'kd_desa' => $data['kd_desa'],
					'nama_desa' => $data['nama_desa'],
					'kd_keg' => $data['kd_keg'],
					'kd_rincian' => $data['kd_rincian'],
					'sumber_dana' => $data['sumberdana'],
					'anggaran_dds' => $data['anggaran_dds'],
				]);

				if ($saveDDS) {
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

	private function getModal($value)
	{
		$dataModal = json_decode($value, true);
		if ($dataModal) {
			$masuk = 0;
			DB::table('penyertaan_modals')->truncate();
			foreach($dataModal as $data) {
				$saveModal = DB::table('penyertaan_modals')->insert([
					'tahun' => $data['tahun'],
					'kd_kec' => $data['kd_kec'],
					'nama_kecamatan' => $data['nama_kecamatan'],
					'kd_desa' => $data['kd_desa'],
					'nama_desa' => $data['nama_desa'],
					'kd_keg' => $data['kd_keg'],
					'kd_rincian' => $data['kd_rincian'],
					'sumber_dana' => $data['sumberdana'],
					'anggaran_dds' => $data['anggaran_dds'],
				]);

				if ($saveModal) {
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
