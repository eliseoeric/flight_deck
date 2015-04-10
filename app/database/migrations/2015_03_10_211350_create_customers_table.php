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
			$table->text('city');
			$table->text('zipcode');
			$table->text('state');
			$table->text('phone');
			$table->integer('representative_id')->unsigned()->index();
//			$table->foreign('representative_id')->references('id')->on('representatives');
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
