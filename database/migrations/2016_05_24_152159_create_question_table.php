<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('series');
            //$table->foreign('series')->references('id')->on('series');
            $table->text('generator');
            $table->string('course');
           // $table->foreign('course')->references('id')->on('courses');
            $table->string('topic');
            $table->string('difficulty');
            $table->string('type');
           // $table->foreign('type')->references('id')->on('types');
            $table->date('last_used');
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
        Schema::drop('questions');
    }
}
