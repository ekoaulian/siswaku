<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama_kelas', 20);
            $table->timestamps();
        });

        //set FK dikolom id_kelas ditable siswa
        Schema::table('siswa', function (Blueprint $table) {
            $table  ->foreign('id_kelas')
                    ->references('id')
                    ->on('kelas')
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
        //drop FK dikolom id_kelas ditable siswa
        Schema::table('siswa', function (Blueprint $table ){
            $table->dropForeign('siswa_id_kelas_foreign');
        });
        Schema::dropIfExists('kelas');
    }
}
