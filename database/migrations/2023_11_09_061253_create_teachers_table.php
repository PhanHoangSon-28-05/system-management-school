<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('image_personal')->unique();
            $table->string('image_citizenIdentification')->unique();
            $table->string('name')->unique();
            $table->string('birthday');
            $table->string('gender')->default('male');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('hometown', 4000);
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
