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
        Schema::create('card_google_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')
                ->constrained('cards')
                ->cascadeOnDelete();
            $table->foreignId('google_business_id')
                ->constrained('google_businesses')
                ->cascadeOnDelete();
            $table->text('google_review_url');
            $table->boolean('is_current')->default(true)->index();
            $table->timestamp('activated_at')->useCurrent();
            $table->timestamp('deactivated_at')->nullable();
            $table->timestamps();

            $table->index(['card_id', 'is_current']);
            $table->index('google_business_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_google_targets');
    }
};
