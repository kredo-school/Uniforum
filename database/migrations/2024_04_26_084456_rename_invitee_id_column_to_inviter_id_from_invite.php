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
        Schema::table('invite', function (Blueprint $table) {
            $table->renameColumn('invitee_id', 'inviter_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invite', function (Blueprint $table) {
            $table->renameColumn('inviter_id', 'invitee_id');
        });
    }
};
