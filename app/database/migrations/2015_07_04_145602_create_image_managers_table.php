<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageManagersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image_managers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id');
			$table->string('type');
			$table->string('name');
			$table->string('location');
			$table->string('thumblocation');
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
		Schema::drop('image_managers');
	}

}
