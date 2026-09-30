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
        Schema::create('seo_pages', function (Blueprint $table) {
            $table->id();
            $table->string('route_name', 100)->unique();
            $table->string('path', 255)->index();
            $table->string('index', 255);
            $table->text('meta_description');
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url', 255)->nullable();
            $table->string('og_title', 255)->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image_path', 255)->nullable();
            $table->enum('schema_type', ['NONE', 'PRODUCT', 'FAQ', 'ORGANIZATION', 'SOFTWARE_APP', 'CUSTOM'])->default('NONE');
            $table->json('schema_json')->nullable();
            $table->string('robots_directive', 50)->default('index, follow');
            $table->enum('changefreq', ['always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'])->default('weekly');
            $table->decimal('priority', 2, 1)->default(0.8);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_pages');
    }
};
