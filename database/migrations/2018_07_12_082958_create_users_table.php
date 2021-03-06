<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->text('permissions', 65535)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('role_id')->nullable();
			$table->boolean('is_hotel_admin')->nullable();
			$table->boolean('is_bus_operator')->nullable();
			$table->boolean('is_super_admin')->nullable();
			$table->string('avatar')->nullable();
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
