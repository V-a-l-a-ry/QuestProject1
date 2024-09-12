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
        Schema::create('intern_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intern_id'); // Foreign key
            $table->unsignedBigInteger('group_id');  // Foreign key
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('intern_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_groups');
    }
};
