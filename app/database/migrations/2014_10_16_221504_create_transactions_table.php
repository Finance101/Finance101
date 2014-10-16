<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	public function up()
	{
		Schema::create('transactions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('credit')->unsigned();
			$table->string('frequency')->default('weekly');
			$table->integer('user_id')->unsigned();
			$table->integer('debit')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('transactions');
	}
}