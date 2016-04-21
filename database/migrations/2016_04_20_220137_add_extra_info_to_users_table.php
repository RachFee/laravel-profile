<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add some fields to the users table to collect extra data
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('city');
			$table->string('twitter');
			$table->string('github');
			$table->string('career_role');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('city');
			$table->dropColumn('twitter');
			$table->dropColumn('github');
			$table->dropColumn('career_role');
		});
    }
}
