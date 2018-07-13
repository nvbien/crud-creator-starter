<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusOperatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus_operators', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->string('password')->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->dateTime('expired_date')->nullable();
			$table->string('status')->nullable();
			$table->string('user_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('groups')->nullable();
			$table->string('avatar')->nullable();
			$table->string('email')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bus_operators');
	}

}
