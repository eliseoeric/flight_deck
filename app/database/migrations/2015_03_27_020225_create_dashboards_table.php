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
			$table->string('heading');
			$table->integer('owner');
			$table->timestamps();
		});

		//Modeled after the Wordpress Database post type. Post can have different types, which are
		//rendered differently in the view.
		//Adding extra details to post is done through the widget_meta.
		Schema::create('widgets', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('dashboard_id')->unsigned()->index();
//			$table->foreign('dashboard_id')->references('id')->on('dashboards')->onDelete('set null');
			$table->text('heading');
			$table->text('size');
			$table->text('class');
			$table->text('type');
		});


		Schema::create('widget_metas', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('widget_id')->unsigned()->index();
//			$table->foreign('widget_id')->references('id')->on('widgets')->onDelete('set null');
			$table->string('meta_key');
			$table->string('meta_value');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('widget_metas');
		Schema::drop('widgets');
		Schema::drop('dashboards');

	}

}
