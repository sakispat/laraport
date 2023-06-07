<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_topic_lesson_instructors', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('event_id')->unsigned()->nullable();
            $table->foreignId('topic_id')->unsigned()->nullable();
            $table->foreignId('lesson_id')->unsigned()->nullable();
            $table->foreignId('instructor_id')->unsigned()->nullable();
            $table->string('date')->nullable();
            $table->string('time_starts')->nullable();
            $table->string('time_ends')->nullable();
            $table->string('duration')->nullable();
            $table->string('room')->nullable();
            $table->string('location_url')->nullable();
            $table->integer('priority')->nullable();
            $table->tinyInteger('automate_mail')->default('0');
            $table->tinyInteger('send_automate_mail')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_topic_lesson_instructors');
    }
};
