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
        Schema::create('vip_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avion_id')->references('id')->on('avions')->onDelete('cascade');
            $table->boolean('VIP')->nullable()->default(false);
            $table->integer('placeVIP')->unsigned()->nullable()->default(0);
            $table->integer('place')->unsigned()->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vip_places');
    }
};
