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
        Schema::create('avions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campagnie_id')->references('id')->on('campagnies')->onDelete('cascade');
            $table->string('mark');
            $table->string('image');
            $table->integer('place')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avions');
    }
};
