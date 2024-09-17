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
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Add the group_id column
            $table->unsignedBigInteger('group_id')->nullable();

            // Add foreign key constraint if you have a groups table
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['group_id']);

            // Drop the group_id column
            $table->dropColumn('group_id');
        });
    }
};
