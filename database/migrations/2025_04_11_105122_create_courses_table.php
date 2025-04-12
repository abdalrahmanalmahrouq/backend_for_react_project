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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('small_title');
            $table->text('small_description');
            $table->string('small_img');
            $table->string('large_title');
            $table->text('large_description');
            $table->string('large_img');
            $table->string('enrolled_students');
            $table->string('duration');
            $table->string('lecutres');
            $table->string('category');
            $table->string('tags');
            $table->string('instructor');
            $table->string('price');
            $table->text('skill_description');
            $table->string('vstringeo_url');
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
        Schema::dropIfExists('courses');
    }
};
