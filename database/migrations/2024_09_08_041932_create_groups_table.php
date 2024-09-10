<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->foreignId('group_leader_id')->constrained('users')->onDelete('cascade');
            $table->string('github_link')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
