<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepEodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rep_eod', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('rep_id');
			$table->float('net_sales');
			$table->int('num_of_orders');
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
		Schema::drop('rep_eod');
	}

}
