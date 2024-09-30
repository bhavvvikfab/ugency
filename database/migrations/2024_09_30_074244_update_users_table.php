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
        Schema::table('users', function (Blueprint $table) {
            // Drop the username column
            $table->dropColumn('username');
            
            // Add first_name and last_name columns
            $table->string('first_name')->nullable()->after('id');
            $table->string('last_name')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             // Add the username column back
             $table->string('username')->nullable()->after('id');

             // Drop the first_name and last_name columns
             $table->dropColumn(['first_name', 'last_name']);
        });
    }
};
