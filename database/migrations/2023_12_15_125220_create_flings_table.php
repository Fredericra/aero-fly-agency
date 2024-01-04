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
        Schema::create('flings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campagnie_id')->references('id')->on('campagnies')->onDelete('cascade');
            $table->foreignId('avion_id')->references('id')->on('avions')->onDelete('cascade');
            $table->string('date');
            $table->string('heureDepart');
            $table->string('heureArrive');
            $table->string('departPlace');
            $table->string('arrivePlace');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flings');
    }
};
