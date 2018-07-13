<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
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
			$table->boolean('is_super')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locations');
	}

}
