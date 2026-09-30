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
        Schema::create('card_activations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')
                ->constrained('cards')
                ->cascadeOnDelete();
            $table->foreignId('google_business_id')
                ->constrained('google_businesses')
                ->cascadeOnDelete();
            $table->enum('activation_type', ['INITIAL', 'RECONFIGURATION'])->default('INITIAL');
            $table->timestamp('activated_at')->useCurrent();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->index('card_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_activations');
    }
};
