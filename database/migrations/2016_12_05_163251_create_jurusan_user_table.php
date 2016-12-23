<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan_user', function (Blueprint $table) {
            $table->string('jurusan_kd', 2);
            $table->integer('user_id')->unsigned();

            $table->primary(['jurusan_kd', 'user_id']);

            $table->foreign('jurusan_kd')
                ->references('kd')->on('jurusans')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('jurusan_user');
    }
}
