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
        Schema::create('business_google_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')
                ->constrained('businesses')
                ->cascadeOnDelete();
            $table->foreignId('google_business_id')
                ->constrained('google_businesses')
                ->cascadeOnDelete();
            $table->boolean('is_primary')->default(false)->index();
            $table->timestamps();

            $table->unique(['business_id', 'google_business_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_google_profiles');
    }
};
