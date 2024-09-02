<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->string('education_level')->nullable()->after('username');
            $table->text('bio')->nullable()->after('education_level');
            $table->text('skills')->nullable()->after('bio');
            $table->string('role')->default('intern')->after('skills');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'education_level', 'bio', 'skills', 'role']);
        });
    }
}
