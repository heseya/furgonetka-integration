<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apis', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->string('url')->unique();
            $table->string('version');
            $table->string('integration_token', 500);
            $table->string('refresh_token', 500);
            $table->string('uninstall_token', 500)->unique();
            $table->string('auth_token', 64);
            $table->string('furgonetka_token', 32)->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apis');
    }
};
