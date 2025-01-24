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
        Schema::create('next_of_kin', function (Blueprint $table) {
            $table->id();
            $table->string('next_of_kin_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->foreignUuid('user_id')->nullable();
            $table->foreignId('relationship_id')->nullable();
            $table->string('fullname')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('count')->nullable();
            $table->string('date_created')->nullable();
            $table->string('date_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('next_of_kin');
    }
};
