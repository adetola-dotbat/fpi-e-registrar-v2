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
        Schema::create('previous_employments', function (Blueprint $table) {
            $table->id();
            $table->string('previous_employment_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->foreignUuid('user_id')->nullable();
            $table->string('company')->nullable();
            $table->string('position_held')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('dates')->nullable();
            $table->string('date_created')->nullable();
            $table->string('date_updated')->nullable();
            $table->string('salary')->nullable();
            $table->text('reason_for_leaving')->nullable();
            $table->string('name_of_employer')->nullable();
            $table->text('employer_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_employments');
    }
};
