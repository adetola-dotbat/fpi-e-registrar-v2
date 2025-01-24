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
        Schema::create('staff_promotions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id');
            $table->string('new_department')->nullable();
            $table->string('new_position')->nullable();
            $table->date('date_of_appointment');
            $table->string('cadre');
            $table->string('salary');
            $table->string('authority');
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_promotions');
    }
};
