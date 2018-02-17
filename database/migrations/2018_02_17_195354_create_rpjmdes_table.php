<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRpjmdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmdes', function (Blueprint $table) {
            $table->increments('id');
			$table->string('tahun', 20);
			$table->string('kd_kec', 10);
			$table->string('nama_kecamatan', 100);
			$table->string('kd_desa', 10);
			$table->string('nama_desa', 100);
			$table->string('kd_bid', 10);
			$table->string('nama_bidang', 100);
			$table->string('kd_keg', 15);
			$table->string('id_keg', 15);
			$table->string('nama_kegiatan', 100);
			$table->string('lokasi', 100)->nullable();
			$table->string('perkiraan_volum', 100)->nullable();
			$table->string('keluaran', 100)->nullable();
			$table->string('kd_sas', 20)->nullable();
			$table->string('sasaran', 100)->nullable();
			$table->tinyInteger('tahun1', false, true)->nullable()->length(1);
			$table->tinyInteger('tahun2', false, true)->nullable()->length(1);
			$table->tinyInteger('tahun3', false, true)->nullable()->length(1);
			$table->tinyInteger('tahun4', false, true)->nullable()->length(1);
			$table->tinyInteger('tahun5', false, true)->nullable()->length(1);
			$table->tinyInteger('tahun6', false, true)->nullable()->length(1);
			$table->double('biaya');
			$table->string('sumber_dana', 15);
			$table->tinyInteger('sewa_kelola', false, true)->nullable()->length(1);
			$table->tinyInteger('kerjasama', false, true)->nullable()->length(1);
			$table->tinyInteger('pihak_ketiga', false, true)->nullable()->length(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpjmdes');
    }
}
