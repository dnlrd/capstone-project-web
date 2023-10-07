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
        Schema::create('question_15', function (Blueprint $table) {
            $table->id();
            $table->integer('answer1_q15')->nullable();
            $table->string('answer2_q15')->nullable();

            $table->integer('answer3_q15')->nullable();
            $table->string('answer4_q15')->nullable();
            $table->unsignedBigInteger('household_id');
            $table->foreign('household_id')->references('id')->on('household')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_15a');
    }
};
