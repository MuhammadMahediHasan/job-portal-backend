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
        Schema::create('job_seeker_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('companies_id');
            $table->unsignedInteger('job_seekers_id');
            $table->string('designation');
            $table->string('address')->nullable();
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->boolean('is_present')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seeker_experiences');
    }
};
