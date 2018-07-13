<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('code')->nullable();
			$table->string('license_plate')->nullable();
			$table->string('model')->nullable();
			$table->timestamps();
			$table->integer('capacity')->nullable()->default(0);
			$table->integer('bus_type_id')->nullable();
			$table->softDeletes();
			$table->enum('status', array('active','inactive'));
			$table->string('avatar')->nullable();
			$table->integer('company_id')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bus');
	}

}
