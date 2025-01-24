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
        Schema::create('staff_institution_attendeds', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id');
            $table->string('school_name');
            $table->string('course_study');
            $table->string('qualification')->nullable();
            $table->string('certificate')->nullable();
            $table->string('date_obtained');
            $table->string('count')->nullable();
            $table->string('approved_status')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_institution_attendeds');
    }
};
