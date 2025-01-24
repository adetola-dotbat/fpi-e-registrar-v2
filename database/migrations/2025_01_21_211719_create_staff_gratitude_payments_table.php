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
        Schema::create('staff_gratitude_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id');
            $table->date('date_of_payment');
            $table->date('from');
            $table->date('to');
            $table->string('rate_of_gratuity');
            $table->string('amount_paid');
            $table->string('file_page_ref');
            $table->string('checked_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_gratitude_payments');
    }
};
