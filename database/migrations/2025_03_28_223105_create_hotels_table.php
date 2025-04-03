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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->integer('stars'); // 1-5 stars
            $table->string('address');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('rating', 3, 1)->nullable(); // e.g. 4.5
            $table->boolean('is_featured')->default(false);
            $table->text('amenities')->nullable();
            $table->decimal('latitude', 10, 8)->notNull();
            $table->decimal('longitude', 11, 8)->notNull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
