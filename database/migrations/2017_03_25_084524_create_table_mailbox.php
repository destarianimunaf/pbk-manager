<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMailbox extends Migration
{
    public function up()
    {
        Schema::create('mailbox', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pengirim');
            $table->string('penerima');
            $table->string('judul');
            $table->date('tanggal_kirim');
            $table->string('isi_pesan');
            $table->string('attach')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('mailbox');
    }
}
