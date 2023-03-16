<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 20);
            $table->string('kategori_id', 20);
            $table->date('tanggal_pengaduan');
            $table->time('jam_pengaduan');
            $table->text('isi_laporan');
            // $table->string('foto', 255);
            $table->string('status', 255);
            $table->string('latitude', 255)->nullable();
            $table->string('longitude', 255)->nullable();
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
        Schema::dropIfExists('pengaduans');
    }
}
