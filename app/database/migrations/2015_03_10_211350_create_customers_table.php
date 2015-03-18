<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->text('name');
			$table->text('address');
			$table->integer('zipcode_id')->unsigned()->index();
			$table->foreign('zipcode_id')->references('id')->on('zipcodes')->onDelete('cascade');
			$table->text('state');
			$table->text('phone');
			$table->integer('rep_id')->unsigned()->index();
			$table->foreign('rep_id')->references('id')->on('representatives')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
