<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrasiMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_matakuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semester_id')->unsigned()->index();
            $table->string('jurusan_kd')->index();
            $table->integer('semes')->unsigned();
            $table->string('matakuliah_kd')->index();
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('jurusan_kd')
                ->references('kd')->on('jurusans')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('semester_id')
                ->references('id')->on('semesters')
                ->onDelete('cascade');
            $table->foreign('matakuliah_kd')
                ->references('kd')->on('matakuliahs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('registrasi_matakuliah');
    }
}
