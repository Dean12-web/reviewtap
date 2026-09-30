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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')
                ->nullable()
                ->constrained('businesses')
                ->restrictOnDelete();
            $table->string('code', 32)->unique();
            $table->enum('product_mode', ['ONE_TIME', 'SUBSCRIPTION'])
                ->default('ONE_TIME')
                ->index();
            $table->enum('status', ['UNACTIVATED', 'ACTIVE', 'SUSPENDED', 'DISABLED'])->default('UNACTIVATED')->index();
            $table->string('pin_hash', 255)->nullable();
            $table->foreignId('google_business_id')
                ->nullable()
                ->constrained('google_businesses')
                ->nullOnDelete();
            $table->foreignId('current_target_id')
                ->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_accessed_at')->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('business_id');
            $table->index('google_business_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
