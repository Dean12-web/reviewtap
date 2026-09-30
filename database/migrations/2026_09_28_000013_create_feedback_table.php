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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')
                ->constrained('businesses')
                ->cascadeOnDelete();
            $table->foreignId('card_id')
                ->nullable()
                ->constrained('cards')
                ->nullOnDelete();
            $table->unsignedTinyInteger('rating')->index();
            $table->text('comment')->nullable();
            $table->string('customer_name', 100)->nullable();
            $table->string('customer_phone', 30)->nullable();
            $table->string('customer_email', 150)->nullable();
            $table->enum('status', ['NEW', 'IN_PROGRESS', 'RESOLVED', 'IGNORED'])->default('NEW')->index();
            $table->timestamp('submitted_at')->useCurrent()->index();
            $table->timestamps();

            $table->index(['business_id', 'submitted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
