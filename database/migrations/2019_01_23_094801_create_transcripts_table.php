<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcripts', function (Blueprint $table) {
            $table->increments('transcript_id')->unsigned();
            $table->integer('student')->unsigned();
            $table->foreign('student')->references('student_id')->on('students');
            $table->integer('semester')->unsigned();
            $table->foreign('semester')->references('semester_id')->on('semesters');
            $table->string('performance');
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
        Schema::dropIfExists('transcripts');
    }
}
