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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('icon')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('type')->comment('1:public 2:private');
            $table->unsignedBigInteger('uni_id');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('uni_id')->references('id')->on('universities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
