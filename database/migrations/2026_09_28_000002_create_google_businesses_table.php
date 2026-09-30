<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('google_businesses', function (Blueprint $table) {
            $table->id();
            $table->string('place_id', 255)->unique();
            $table->string('name', 200);
            $table->text('address')->nullable();
            $table->text('google_maps_url')->nullable();
            $table->text('google_review_url');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_businesses');
    }
};
