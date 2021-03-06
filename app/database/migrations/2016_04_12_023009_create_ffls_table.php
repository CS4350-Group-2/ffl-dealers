<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFflsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ffls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('LicType', 255);
			$table->string('LicXprdte', 255);
			$table->string('LicenseName', 255);
			$table->string('PremiseStreet', 255);
			$table->string('PremiseCity', 255);
			$table->string('PremiseState', 255);
			$table->string('PremiseZipCode', 255);
			$table->string('VoicePhone', 255);
			$table->string('Email', 320);
			$table->string('Website', 255);
			$table->integer('AcceptTransfer')->default(3);
			$table->double('Rating', 2, 1);
			$table->string('Bio', 255);
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
		Schema::drop('ffls');
	}

}
