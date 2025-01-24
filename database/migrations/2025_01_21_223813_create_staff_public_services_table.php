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
        Schema::create('staff_public_services', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id');
            $table->string('organization');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('pensionable_emolument');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_public_services');
    }
};
