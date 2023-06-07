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
        Schema::create('instructors', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('priority')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->bigInteger('comment_status')->nullable();
            $table->string('title')->nullable();
            $table->string('short_title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('header')->nullable();
            $table->string('company')->nullable();
            $table->text('summary')->nullable();
            $table->text('body')->nullable();
            $table->string('ext_url')->nullable();
            $table->longText('social_media')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('creator_id')->nullable();
            $table->string('created_at', 500)->nullable();
            $table->string('updated_at', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
