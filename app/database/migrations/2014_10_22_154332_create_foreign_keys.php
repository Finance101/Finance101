<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('transactions', function(Blueprint $table) {
			$table->foreign('simulation_id')->references('id')->on('simulations')
						->onDelete('cascade')
						->onUpdate('cascade');
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('savings', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('goals', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('simulations', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('transactions', function(Blueprint $table) {
			$table->dropForeign('transactions_user_id_foreign');
			$table->dropForeign('transactions_sim_id_foreign');
		});
		Schema::table('savings', function(Blueprint $table) {
			$table->dropForeign('savings_user_id_foreign');
		});
		Schema::table('goals', function(Blueprint $table) {
			$table->dropForeign('goals_user_id_foreign');
		});
		Schema::table('simulations', function(Blueprint $table) {
			$table->dropForeign('simulations_user_id_foreign');
		});
	}
}