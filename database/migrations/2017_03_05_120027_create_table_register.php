<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegister extends Migration
{
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_pem', 8)->unique();
            $table->string('nama_pengaju');
            $table->string('cp', 15);
            $table->date('tanggal_masuk');
            $table->string('jenis_pajak');
            $table->string('masa');
            $table->double('setor');
            $table->double('nilai_pbk');
            $table->enum('keterangan', ['proses', 'pending']);
            $table->integer('id_wp')->unsigned();
            $table->string('scanregister')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('register');
    }
}