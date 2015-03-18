<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountyRepresentativeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('county_representative', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('county_id')->unsigned()->index();
			$table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
			$table->integer('representative_id')->unsigned()->index();
			$table->foreign('representative_id')->references('id')->on('representatives')->onDelete('cascade');
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
		Schema::drop('county_representative');
	}

}
