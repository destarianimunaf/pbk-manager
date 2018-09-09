<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('npwp', 15)->unique();
            $table->string('nama_wp', 30);
            $table->string('alamat');
            $table->timestamps();
        });

        //set FK id_wp di tabel register
        Schema::table('register', function (Blueprint $table) {
            $table->foreign('id_wp')
            ->references('id')
            ->on('wp')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('register', function (Blueprint $table){
            $table->dropForeign('register_id_wp_foreign');
        });

        Schema::drop('wp');
    }
}
