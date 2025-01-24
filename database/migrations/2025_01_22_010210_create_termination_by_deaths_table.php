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
        Schema::create('termination_by_deaths', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id');
            $table->date('date_of_death');
            $table->string('estate_gratuity');
            $table->string('widow_pension')->nullable();
            $table->string('widow_pension_from')->nullable();
            $table->string('orphan_pension')->nullable();
            $table->string('orphan_pension_from')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termination_by_deaths');
    }
};
