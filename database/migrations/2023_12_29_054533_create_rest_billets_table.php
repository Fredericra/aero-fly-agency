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
        Schema::create('rest_billets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vole_id')->references('id')->on('voles')->onDelete('cascade');
            $table->integer('VipRest')->unsigned();
            $table->integer('ClassRest')->unsigned();
            $table->integer('totalRest')->unsigned()->nullable()->default(0);
            $table->boolean('stop')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rest_billets');
    }
};
