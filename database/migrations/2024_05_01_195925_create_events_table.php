<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->text('description'); 
            $table->date('date'); 
            $table->time('time'); 
            $table->string('image'); 
            $table->string('location');
            $table->string('organizer')->nullable(); 
            $table->float('price')->nullable(); 
            $table->integer('seats_available')->nullable(); 
            $table->timestamps();
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
