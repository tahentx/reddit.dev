<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassExercise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Posts', function(Blueprint $table))
        {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->string('content');
            $table->foreign('created_by')->references('created_by')->on('user');
            $table->timestamps();
            $table->timestamps();
        }



        Schema::create('Votes', function(Blueprint $table))
        {
            $table->increments('id');
            $table->foreign('user_id')->references('created_by')->on('user');
            $table->foreign('post_id')->references('created_by')->on('Posts');
            $table->bigInteger('vote');
            $table->timestamps();
            $table->timestamps();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('Posts');
    }

   public function down()
    {
         Schema::drop('Votes');
    }
}
