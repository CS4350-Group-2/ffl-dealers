<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
     {
          $table->increments('id');
          $table->string('name', 32);
          $table->string('username', 32);
          $table->string('email', 320);
          $table->string('password', 64);
          $table->integer('fflid')->references('id')->on('ffls');   //used to check if user is a Dealer user;
          $table->boolean('subscribed')->default(0);
			 

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
		Schema::drop('users');
	}

}
