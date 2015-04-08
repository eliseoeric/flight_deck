<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepresentativesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('representatives', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->text('first_name');
			$table->text('last_name');
			$table->text('email');
			$table->text('phone');
			// purchase_order
			// current sales ?
			$table->float('net_sales', 10, 2);
			// customers
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
		Schema::drop('representatives');
	}

}
