<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dashboards', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->text('name');
			$table->text('owner');
			$table->timestamps();
		});

		Schema::create('widgets', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->text('title');
			$table->text('row');
			$table->text('table');
			$table->text('query');
			$table->text('classes');
			$table->integer('dashboard_id')->unsigned()->index();
			$table->foreign('dashboard_id')->references('id')->on('dashboards')->onDelete('cascade');
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
		Schema::drop('widgets');
	}

}
