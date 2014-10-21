<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email', 200)->unique();
		    $table->string('first_name', 200);
		    $table->string('last_name');
		    $table->string('password', 255);
		    $table->string('remember_token', 100)->nullable();
		    $table->integer('approx_daily_change');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}