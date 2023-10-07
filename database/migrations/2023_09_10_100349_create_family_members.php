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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('relationship_to_head')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('solo_parent')->nullable();
            $table->string('religion')->nullable();
            $table->string('ibang_relihiyon')->nullable();

            $table->string('studying')->nullable();
            $table->string('has_job')->nullable();
            $table->string('job')->nullable();
            $table->string('known_work')->nullable();

            $table->string('where')->nullable();
            $table->string('iba_pa_saan')->nullable();

            $table->string('sector')->nullable();
            $table->string('iba_pa_sektor')->nullable();

            $table->string('position')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('level_of_nutrition')->nullable();

            $table->string('type_of_disability')->nullable();
            $table->string('iba_pa_kapansanan')->nullable();
            
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
        Schema::dropIfExists('family_members');
    }
};
