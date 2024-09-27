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
        Schema::create('client_city', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Client foreign key
            $table->unsignedBigInteger('city_id'); // City foreign key

            // Set foreign key constraints
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade'); 
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade'); 

            // $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Foreign key to clients table
            // $table->foreignId('city_id')->constrained('city')->onDelete('cascade'); // Foreign key to city table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_city');
    }
};
