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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 30)
                ->nullable()
                ->after('password');

            $table->enum('status', ['active', 'inactive'])
                ->default('active')
                ->index()
                ->after('phone');

            $table->timestamp('last_login_at')
                ->nullable()
                ->after('email_verified_at');

            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(
                'phone',
                'status',
                'last_login_at',
                'deleted_at'
            );
        });
    }
};
