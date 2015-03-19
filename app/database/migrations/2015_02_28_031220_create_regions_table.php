<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regions', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('region')->unique();
			$table->timestamps();
		});

		Schema::create('counties', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('county')->unique();
			$table->integer('region_id')->unsigned()->index();
			$table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

			$table->timestamps();
		});

		Schema::create('cities', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('city')->unique();
			$table->integer('county_id')->unsigned()->index();
			$table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('zipcodes', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('zipcode')->unqiue();
			$table->integer('city_id')->unsigned()->index();
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
		Schema::drop('regions');
		Schema::drop('counties');
		Schema::drop('cities');
		Schema::drop('zipcodes');
	}

}
