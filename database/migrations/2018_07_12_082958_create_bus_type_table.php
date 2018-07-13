<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code')->unique();
			$table->string('description', 1000)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->enum('status', array('active','inactive'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bus_type');
	}

}
