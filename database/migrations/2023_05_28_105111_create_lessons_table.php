<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->foreignId('course_id')->constrained('courses');
            $table->uuid('module_id')->nullable(false);
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('video')->unique();
            $table->text('description')->nullable();
            $table->foreign('module_id')->references('id')->on('modules');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
