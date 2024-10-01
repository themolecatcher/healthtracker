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
        Schema::create('allergen_meal', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('meal_id');
            $table->unsignedInteger('allergen_id');
            $table->timestamps();
        
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->foreign('allergen_id')->references('id')->on('allergens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_allergen');
    }
};
