<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCountiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('counties', function(Blueprint $table){
			$table->integer('representative_id')->unsigned();
//			$table->foreign('representative_id')->references('id')->on('representatives');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('counties', function($table)
		{
			$table->dropColumn('representative_id');
		});
	}

}
