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
        Schema::create('client_language', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Client foreign key
            $table->unsignedBigInteger('language_id'); // Language foreign key

            // Set foreign key constraints
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade'); 
            $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade'); 

            // $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Foreign key to clients table
            // $table->foreignId('language_id')->constrained('language')->onDelete('cascade'); // Foreign key to language table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_language');
    }
};
