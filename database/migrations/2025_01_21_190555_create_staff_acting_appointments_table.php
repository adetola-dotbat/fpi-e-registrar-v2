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
        Schema::create('staff_acting_appointments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id');
            $table->string('position');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('reference');
            $table->string('rate_of_allowance');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_acting_appointments');
    }
};
