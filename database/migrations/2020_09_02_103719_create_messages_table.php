<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chat_id');
            $table->string('details');
            $table->string('model')->in(['App\Models\Admin', 'App\Models\Student']);
            $table->unsignedBigInteger('sender_id');
            $table->boolean('admin_view')->default(0);
            $table->boolean('student_view')->default(0);
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
        Schema::dropIfExists('messages');
    }
}
