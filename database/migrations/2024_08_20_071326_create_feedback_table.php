<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->text('Feedback_text');
            $table->unsignedBigInteger('Feedbackable_id');
            $table->string('Feedbackable_type', 50);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('progress_id')->constrained('intern_progress')->onDelete('cascade');
            $table->timestamp('DateGiven')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
