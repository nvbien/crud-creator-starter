<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id')->nullable();
			$table->string('start_address')->nullable();
			$table->string('end_address')->nullable();
			$table->string('start_latlong')->nullable();
			$table->string('end_latlong')->nullable();
			$table->string('status')->nullable();
			$table->timestamp('start_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('end_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('validation_token')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tickets');
	}

}
