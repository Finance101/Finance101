<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalanceTable extends Migration {

	public function up()
	{
		Schema::create('balance', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->date('date');
			$table->integer('value');
		});
	}

	public function down()
	{
		Schema::drop('balance');
	}
}