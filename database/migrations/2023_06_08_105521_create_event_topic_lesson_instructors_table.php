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
        Schema::disableForeignKeyConstraints();

        Schema::create('event_topic_lesson_instructors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->foreignId('topic_id')->constrained();
            $table->foreignId('lesson_id')->constrained();
            $table->foreignId('instructor_id')->constrained();
            $table->string('date')->nullable();
            $table->string('time_starts')->nullable();
            $table->string('time_ends')->nullable();
            $table->string('duration')->nullable();
            $table->string('room')->nullable();
            $table->string('location_url')->nullable();
            $table->integer('priority')->nullable();
            $table->tinyInteger('automate_mail')->default(0);
            $table->tinyInteger('send_automate_mail')->default(0);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('even_topic_lesson_instructors');
    }
};
