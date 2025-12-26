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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('Birth_Date');
            $table->string('academic_year');
            $table->foreignId('Gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreignId('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreignId('blood_id')->references('id')->on('blood_types')->onDelete('cascade');
            $table->foreignId('Grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreignId('class_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreignId('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('parent_id')->references('id')->on('my__parents')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
