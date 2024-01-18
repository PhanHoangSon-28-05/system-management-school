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
        Schema::create('detail__scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('score_id')->constrained('scores')->cascadeOnDelete();
            $table->string('attendance')->default('0');
            $table->string('scores_1_1')->default('0');
            $table->string('scores_2_2')->default('0');
            $table->string('final_score')->default('0');
            $table->string('medium_score')->default('0');
            $table->string('scale_4')->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__scores');
    }
};
