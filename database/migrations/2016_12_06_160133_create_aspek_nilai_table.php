<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspekNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspek_nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('registrasi_mahasiswa_id')->unsigned()->index();
            $table->integer('aspek_id')->unsigned()->index();
            $table->enum('skor', [1, 2, 3, 4, 5]);
            $table->timestamps();

            $table->foreign('registrasi_mahasiswa_id')
                ->references('id')->on('registrasi_mahasiswa')
                ->onDelete('cascade');
            $table->foreign('aspek_id')
                ->references('id')->on('aspeks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspek_nilai');
    }
}
