<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveQuestionsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->dropColumn('questions');
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedInteger('challenge_id');
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->string('title');
            $table->jsonb('question_data')->default('[]');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');

        Schema::table('challenges', function (Blueprint $table) {
            $table->jsonb('questions')->default('[]');
        });
    }
}
