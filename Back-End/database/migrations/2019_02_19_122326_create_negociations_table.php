<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negociations', function (Blueprint $table) {
            $table->increments('id');
            $table->float('value');
            $table->integer('id_user_deposit')->unsigned();
            $table->integer('id_user_receive')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('negociations', function (Blueprint $table){
          $table->foreign('id_user_deposit')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('id_user_receive')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negociations');
    }
}
