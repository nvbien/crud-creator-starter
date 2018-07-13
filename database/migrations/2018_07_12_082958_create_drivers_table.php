<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drivers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('license_ic')->nullable();
			$table->dateTime('expired_date')->nullable();
			$table->string('status')->nullable();
			$table->string('user_id')->nullable();
			$table->string('pass_code')->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->string('groups')->nullable();
			$table->string('avatar')->nullable();
			$table->string('vocation')->nullable();
			$table->integer('company_id')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('drivers');
	}

}
