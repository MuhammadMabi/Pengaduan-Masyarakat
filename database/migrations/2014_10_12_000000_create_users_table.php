<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 20)->unique();
            $table->string('nama', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('telp', 20);
            $table->string('jenis_kelamin', 150);
            $table->string('role', 150);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('rt', 50);
            $table->string('rw', 50);
            $table->string('kode_pos', 50);
            $table->string('province_id', 50);
            $table->string('regency_id', 50);
            $table->string('district_id', 50);
            $table->string('village_id', 50);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
