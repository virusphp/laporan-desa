<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggarans', function (Blueprint $table) {
            $table->increments('id');
			$table->string('tahun', 20);
			$table->string('kd_kec', 10);
			$table->string('nama_kecamatan', 100);
			$table->string('kd_desa', 10);
			$table->string('nama_desa', 100);
			$table->string('kd_keg', 15);
			$table->string('kd_rincian', 15);
			$table->string('sumber_dana', 15);
			$table->double('anggaran_dds');
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
        Schema::dropIfExists('anggarans');
    }
}
