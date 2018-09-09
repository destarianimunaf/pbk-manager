<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePbk extends Migration
{
    public function up()
    {
        Schema::create('pbk', function (Blueprint $table) {
            $table->integer('id_register')->unsigned()->primary('id_register');
            $table->string('nomor_pbk')->unique();
            $table->increments('id');
            $table->date('tanggal_cetak');
            $table->string('lokasi_map');
            $table->enum('status', ['done', 'denied']);
            $table->string('reason');
            $table->enum('pos', ['ambil', 'kirim']);
            $table->string('scanpbk')->nullable();
            $table->timestamps();

            $table->foreign('id_register')
            ->references('id')->on('register')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('pbk');
    }
}
