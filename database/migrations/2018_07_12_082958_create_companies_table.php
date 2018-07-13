<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code')->unique();
			$table->string('name')->nullable();
			$table->string('invoice_prefix')->unique();
			$table->string('receipt_prefix')->unique();
			$table->boolean('gst_enable')->default(0);
			$table->string('gst_number')->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->text('remark', 65535)->nullable();
			$table->string('logo')->nullable();
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
		Schema::drop('companies');
	}

}
