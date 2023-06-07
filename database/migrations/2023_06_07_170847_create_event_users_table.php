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
        Schema::create('event_users', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('event_id')->unsigned()->nullable();
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->tinyInteger('paid')->nullable();
            $table->string('expiration')->nullable();
            $table->integer('payment_method')->nullable()->default('0');
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_users');
    }
};
