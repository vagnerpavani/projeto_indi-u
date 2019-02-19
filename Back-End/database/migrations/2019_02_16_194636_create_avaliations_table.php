<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->integer('grade');
            $table->integer('id_user_measurer')->unsigned();
            $table->integer('id_user_measured')->unsigned();
            $table->timestamps();
        });

        Schema::table('avaliations', function (Blueprint $table){
            $table->foreign('id_user_measurer')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_measured')->references('id')->on('users')->onDeleete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliations');
    }
}
