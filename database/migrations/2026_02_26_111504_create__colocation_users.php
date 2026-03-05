<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('colocation_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('colocation_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['owner', 'member'])->default('member');
            $table->enum('status', ['active', 'left'])->default('active');
            $table->decimal('sold', 8, 2)->default(0);
            $table->date('left_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colocation_users');
    }
};