<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_tokens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ref_type');
			$table->integer('ref_id');
			$table->string('type')->nullable();
			$table->string('device')->nullable();
			$table->string('access_token', 60)->unique();
			$table->timestamps();
			$table->string('device_token')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auth_tokens');
	}

}
