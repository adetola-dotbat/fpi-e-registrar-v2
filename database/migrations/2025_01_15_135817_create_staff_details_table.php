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
        Schema::create('staff_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable();
            $table->string('date_of_assumption')->nullable();
            $table->string('date_of_presence')->nullable();
            $table->string('staff_type')->nullable();
            $table->string('post_offered')->nullable();
            $table->string('post_applied')->nullable();
            $table->string('department')->nullable();
            $table->string('current_post')->nullable();
            $table->string('current_department')->nullable();
            $table->string('salary')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('grade_level')->nullable();
            $table->string('onleave_return')->nullable();
            $table->string('appointment_type')->nullable();
            $table->foreignUuid('staff_step_id')->nullable();
            $table->foreignId('staff_cadre_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_details');
    }
};
