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
        Schema::create('card_access_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->constrained('cards')->cascadeOnDelete();
            $table->enum('event', ['SCAN', 'ACTIVATION_VIEW', 'REDIRECT', 'MANAGE_VIEW', 'PIN_SUCCESS', 'PIN_FAILED'])->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('referer')->nullable();
            $table->string('device', 50)->nullable();
            $table->timestamp('created_at')->useCurrent()->index();

            $table->index(['card_id', 'event']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_access_logs');
    }
};
