<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('first_name', 250);
			$table->string('last_name', 250);
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}