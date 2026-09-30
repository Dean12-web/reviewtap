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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')
                ->cascadeOnDelete();
            $table->foreignId('menu_item_id')->nullable()
                ->constrained('menu_items')
                ->nullOnDelete();
            $table->string('name_snapshot', 150);
            $table->decimal('price_snapshot', 15, 2);
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('subtotal', 15, 2);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
