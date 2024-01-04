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
        Schema::create('billet_actives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vole_id')->references('id')->on('voles')->onDelete('cascade');
            $table->foreignId('compte_id')->references('id')->on('comptes')->onDelete('cascade');
            $table->string('pays')->nullable()->default('text');
            $table->string('passport')->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billet_actives');
    }
};
