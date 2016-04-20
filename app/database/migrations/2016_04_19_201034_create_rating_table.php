<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rating', function(Blueprint $table)
		{
			$table->increments('rating_id');
			$table->int('post_id');
			$table->int('rating_number');
			$table->int('total_points');
			$table->datetime('created');
			$table->datetime('modified');
			$table->tinyint('status');
			$table->primary('rating_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rating');
	}

}
