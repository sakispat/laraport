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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('priority')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('published');
            $table->datetime('release_date_files')->nullable();
            $table->string('expiration')->nullable();
            $table->string('title')->nullable();
            $table->mediumText('htmlTitle')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('header')->nullable();
            $table->text('summary')->nullable();
            $table->text('body')->nullable();
            $table->string('hours')->nullable();
            $table->integer('absences_limit')->default('0');
            $table->tinyInteger('enroll')->default('0');
            $table->tinyInteger('index')->default('0');
            $table->tinyInteger('feed')->default('0');
            $table->text('certificate_title')->nullable();
            $table->text('fb_group')->nullable();
            $table->text('evaluate_topics')->nullable();
            $table->text('evaluate_instructors')->nullable();
            $table->text('fb_testimonial')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('creator_id')->nullable();
            $table->string('view_tpl')->nullable();
            $table->integer('view_counter')->nullable();
            $table->string('published_at')->nullable();
            $table->string('created_at', 500)->nullable();
            $table->string('updated_at', 500)->nullable();
            $table->string('launch_date')->nullable();
            $table->text('xml_title')->nullable();
            $table->text('xml_description')->nullable();
            $table->text('xml_short_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
