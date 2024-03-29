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
        Schema::create('date_voles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vole_id')->references('id')->on('voles')->onDelete('cascade');
            $table->string('DateDepart')->nullable()->default('text');
            $table->string('TimeDepart')->nullable()->default('text');
            $table->string('DateArrive')->nullable()->default('text');
            $table->string('TimeArrive')->nullable()->default('text');
            $table->boolean('confirmed')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_voles');
    }
};
