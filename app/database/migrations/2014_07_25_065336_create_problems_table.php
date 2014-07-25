<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('problems', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->text('sampleinput');
			$table->text('sampleoutput');
			$table->integer('event_id');
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
		Schema::table('problems', function(Blueprint $table)
		{
			//
			$table->drop();
		});
	}

}
