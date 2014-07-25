<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->timestamp('start_time');
			$table->string('duration');
			$table->string('remarks');
			$table->timestamps();
			$table->create();
			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events', function(Blueprint $table)
		{
			//
			$table->drop();
		});
	}

}
