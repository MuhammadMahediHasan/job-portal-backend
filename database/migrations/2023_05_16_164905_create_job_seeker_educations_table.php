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
        Schema::create('job_seeker_educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('job_seekers_id');
            $table->string('institute');
            $table->string('degree');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->boolean('is_present')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seeker_educations');
    }
};
