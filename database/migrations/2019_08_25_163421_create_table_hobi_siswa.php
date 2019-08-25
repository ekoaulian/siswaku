<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHobiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_siswa', function (Blueprint $table) {
            //create table hobi siswa
            $table->integer('id_siswa')->unsigned()->index();
            $table->integer('id_hobi')->unsigned()->index();
            $table->timestamps();

            //set Fk hobi_siswa -- siswa
            $table  ->foreign('id_siswa')
                    ->references('id')
                    ->on('siswa')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            //set Fk hobi_siswa -- hobi
            $table  ->foreign('id_hobi')
                    ->references('id')
                    ->on('hobi')
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
        Schema::dropIfExists('hobi_siswa');
    }
}
