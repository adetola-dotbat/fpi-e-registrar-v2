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
        Schema::create('staff_leaves', function (Blueprint $table) {
            $table->uuid('id')->primary();


            $table->foreignUuid('user_id'); // Foreign key to the users table
            $table->date('date_leave_requested');
            $table->date('date_resume_duty');
            $table->text('leave_address')->nullable();
            $table->text('recommend')->nullable();
            $table->foreignUuid('leave_type_id'); // Foreign key to the leave_types table
            $table->text('reasons')->nullable();
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_leaves');
    }
};
