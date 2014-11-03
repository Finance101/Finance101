<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlossaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('glossary', function(Blueprint $table)
        {
             // columns
            $table->increments('id');
            $table->string('glossary_title');
            $table->text('glossary_desc')->nullable();
            $table->char('alpha', 1);
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
		Schema::drop('glossary');
	}

}
