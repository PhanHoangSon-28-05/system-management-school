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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('image_personal')->unique();
            $table->string('image_citizenIdentification_front')->unique();
            $table->string('image_citizenIdentification_backside')->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('birthday');
            $table->string('gender')->default('male');
            $table->string('email');
            $table->string('phone');
            $table->string('hometown', 4000);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
