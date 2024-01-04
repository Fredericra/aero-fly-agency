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
        Schema::create('voles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compagnie_id')->references('id')->on('campagnies')->onDelete('cascade');
            $table->foreignId('avion_id')->references('id')->on('avions')->onDelete('cascade');
            $table->integer('BVip')->nullable()->defalut(0);
            $table->integer('BN');
            $table->string('depart');
            $table->string('arriver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voles');
    }
};
