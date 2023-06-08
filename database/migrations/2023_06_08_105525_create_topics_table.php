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

        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('priority')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->bigInteger('comment_status')->nullable();
            $table->string('title')->nullable();
            $table->string('short_title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('header')->nullable();
            $table->text('summary')->nullable();
            $table->text('body')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('creator_id')->nullable();
            $table->string('email_template')->nullable();
            $table->string('created_at', 500)->nullable();
            $table->string('updated_at', 500)->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
