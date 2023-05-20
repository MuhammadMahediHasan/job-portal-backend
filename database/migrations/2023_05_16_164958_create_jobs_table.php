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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('job_categories_id');
            $table->unsignedInteger('companies_id');
            $table->string('slug');
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->string('salary_range');
            $table->integer('vacancy');
            $table->string('job_nature');
            $table->date('dead_line');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
