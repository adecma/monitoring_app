<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->increments('id');            
            $table->enum('jenis', ['Ganjil', 'Genap']);
            $table->enum('status', ['Aktif', 'Non']);
            $table->integer('periode_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('periode_id')
                ->references('id')->on('periodes')
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
        Schema::dropIfExists('semesters');
    }
}
