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
        Schema::create('client_country', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Client foreign key
            $table->unsignedBigInteger('country_id'); // Country foreign key

            // Set foreign key constraints
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade'); 
            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade'); 
            
     
            // $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Foreign key to clients table
            // $table->foreignId('country_id')->constrained('country')->onDelete('cascade'); // Foreign key to country table
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_country');
    }
};
