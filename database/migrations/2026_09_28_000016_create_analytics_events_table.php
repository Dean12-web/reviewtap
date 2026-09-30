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
        Schema::create('analytics_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')
                ->constrained('businesses')
                ->cascadeOnDelete();
            $table->foreignId('card_id')
                ->nullable()
                ->constrained('cards')
                ->nullOnDelete();
            $table->enum('event', ['CARD_VIEW', 'FEEDBACK_STARTED', 'FEEDBACK_SUBMITTED', 'GOOGLE_CLICKED', 'WHATSAPP_CLICKED', 'FOLLOW_UP_CREATED', 'FOLLOW_UP_RESOLVED'])->index();
            $table->string('session_id', 64)->nullable();
            $table->json('metadata')->nullable();
            $table->string('ip_hash', 64)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->useCurrent()->index();

            $table->index(['business_id', 'event', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_events');
    }
};
