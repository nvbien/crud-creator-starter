<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('routes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('start_address')->nullable();
			$table->string('end_address')->nullable();
			$table->string('start_latlong')->nullable();
			$table->string('end_latlong')->nullable();
			$table->integer('employee_id');
			$table->string('status')->nullable();
			$table->integer('user_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->timestamp('start_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('end_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('bus_id')->nullable();
			$table->integer('driver_id')->nullable();
			$table->integer('company_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('routes');
	}

}
