<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->nullable();
			$table->integer('xsmall')->nullable();
			$table->integer('small')->nullable();
			$table->integer('medium')->nullable();
			$table->integer('large')->nullable();
			$table->integer('xlarge')->nullable();
			$table->integer('xxlarge')->nullable();
			$table->integer('xxxlarge')->nullable();
			$table->integer('onesize')->nullable();
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
		Schema::drop('inventories');
	}

}
