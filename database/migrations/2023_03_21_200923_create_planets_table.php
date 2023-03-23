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
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('climate');
            $table->string('created');
            $table->string('diameter');
            $table->string('edited');
            $table->string('gravity');
            $table->string('name');
            $table->string('orbital_period');
            $table->string('population');
            $table->string('rotation_period');
            $table->string('surface_water');
            $table->string('terrain');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planets');
    }
};
