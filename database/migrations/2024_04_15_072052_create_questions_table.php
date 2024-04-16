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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->longText('image');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('uni_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('team')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('uni_id')->references('id')->on('universities')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foregin('team')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
