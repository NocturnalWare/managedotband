<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shippings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('phone');
			$table->string('ship_f_name');
			$table->string('ship_l_name');
			$table->string('ship_address1');
			$table->string('ship_address2');
			$table->string('ship_city');
			$table->string('ship_state');
			$table->string('ship_zip');
			$table->string('cart_id');
			$table->string('cart_amt');
			$table->string('payment_status');
			$table->string('shipped_status');
			$table->string('tracking_number');
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
		Schema::drop('shippings');
	}

}
