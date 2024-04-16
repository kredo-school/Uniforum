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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->unsignedBigInteger('q_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('image');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foregin('q_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
