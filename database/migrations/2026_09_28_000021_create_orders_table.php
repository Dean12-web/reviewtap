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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')
                ->constrained('businesses')
                ->restrictOnDelete();
            $table->foreignId('table_id')
                ->nullable()
                ->constrained('tables')
                ->nullOnDelete();
            $table->string('order_number', 50)->unique();
            $table->enum('status', ['pending', 'confirmed', 'preparing', 'served', 'completed', 'cancelled'])->default('pending')->index();
            $table->decimal('subtotal', 15, 2)->default(0.00);
            $table->decimal('discount', 15, 2)->default(0.00);
            $table->decimal('tax', 15, 2)->default(0.00);
            $table->decimal('total', 15, 2)->default(0.00);
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid')->index();
            $table->timestamp('ordered_at')->useCurrent();
            $table->timestamps();

            $table->index(['business_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
