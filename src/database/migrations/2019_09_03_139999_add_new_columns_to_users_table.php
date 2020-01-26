<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->after('email');
            $table->string('last_failed_login_ip')->after('remember_token');
            $table->string('last_failed_login_at')->after('remember_token');
            $table->string('last_login_ip')->after('remember_token');
            $table->string('last_login_at')->after('remember_token');
            $table->string('status')->after('remember_token');
            $table->string('user_level')->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_image');
            $table->dropColumn('user_level');
            $table->dropColumn('status');
            $table->dropColumn('last_login_at');
            $table->dropColumn('last_login_ip');
            $table->dropColumn('last_failed_login_at');
            $table->dropColumn('last_failed_login_ip');
        });
    }
}
