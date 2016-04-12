<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ffls', function(Blueprint $table)
		{
			$table->increments('fflid');
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
			$table->string('AcceptTransfer', 3);
			
		});
		
		
		Schema::create('deals', function(Blueprint $table)
		{
				$table->increments('dealid');
				$table->string('name', 255);
				$table->timestamps();
		});
		
		Schema::create('comments', function(Blueprint $table)
		{
				$table->increments('commentid');
			  $table->integer('userid');
				$table->string('comment', 255);
				$table->timestamps();
		});
		
		Schema::create('favorites', function(Blueprint $table)
		{
				$table->increments('favoriteid');
			  $table->integer('userid');
				$table->integer('fflid');
				$table->timestamps();
		});
		
		
		Schema::create('users', function(Blueprint $table)
     {
          $table->increments('userid');
          $table->string('name', 32);
          $table->string('username', 32);
          $table->string('email', 320);
          $table->string('password', 64);

                      // required for Laravel 4.1.26
                      $table->string('remember_token', 100)->nullable();
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
			Schema::drop('deals');
			Schema::drop('comments');
			Schema::drop('favorites');
			Schema::drop('users');
		
	}

}
