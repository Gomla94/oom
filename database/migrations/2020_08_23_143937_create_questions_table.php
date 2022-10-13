<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->tinyInteger('difficulty_level');
            $table->tinyInteger('type')->in([1,2]);
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->boolean('true_false')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
