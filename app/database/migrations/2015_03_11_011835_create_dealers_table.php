<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dealers', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->text('name');
			$table->timestamps();
		});

		Schema::table('purchase_orders', function($table) {
			$table->foreign('customer_id')->references('id')->on('customers');
			$table->foreign('manufacturer_id')->references('id')->on('manufacturers');
			$table->foreign('dealer_id')->references('id')->on('dealers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dealers');
	}

}
