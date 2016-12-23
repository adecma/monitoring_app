<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspeks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('kompetensi_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('kompetensi_id')
                ->references('id')->on('kompetensis')
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
        Schema::dropIfExists('aspeks');
    }
}
