<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreignId('class_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
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
        Schema::dropIfExists('supjects');
    }
};
