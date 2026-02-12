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
        Schema::create('hardware_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price')->comment('Price in cents');
            $table->integer('quantity');
            $table->string('description')->nullable();
            $table->string('status')->default('available');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_items');
    }
};
