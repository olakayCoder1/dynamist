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
        Schema::create('input_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('has_validation')->default(false);
            $table->boolean('has_options')->default(false);
            $table->string('response_type')->default('SINGLE');
            $table->boolean('is_date')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_types');
    }
};
