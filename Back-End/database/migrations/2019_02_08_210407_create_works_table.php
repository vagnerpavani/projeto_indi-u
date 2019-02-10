<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('duty', 50);
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('works', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('works', function (Blueprint $table){
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
