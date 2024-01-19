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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('body_type');
            $table->integer('fuel_type');
            $table->integer('gearbox');
            $table->float('price_per_day');
            $table->float('price_per_km');
            $table->string('carImage1');
            $table->string('carImage2')->nullable();
            $table->string('carImage3')->nullable();
            $table->string('carImage4')->nullable();
            $table->string('carImage5')->nullable();
            $table->string('carImage6')->nullable();
            $table->string('carImage7')->nullable();
            $table->string('carImage8')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
