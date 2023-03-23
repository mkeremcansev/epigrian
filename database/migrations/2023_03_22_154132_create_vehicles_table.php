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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('cargo_capacity');
            $table->string('consumables');
            $table->string('cost_in_credits');
            $table->string('created');
            $table->string('crew');
            $table->string('edited');
            $table->string('length');
            $table->string('manufacturer');
            $table->string('max_atmosphering_speed');
            $table->string('model');
            $table->string('name');
            $table->string('passengers');
            $table->string('vehicle_class');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
