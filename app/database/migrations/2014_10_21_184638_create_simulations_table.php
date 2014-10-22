<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSimulationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('simulations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('approx_daily_value', 10, 2);
			$table->int('user_id')->unsigned();
			$table->text('title');
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
		Schema::drop('simulations');
	}

}
