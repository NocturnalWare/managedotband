<?php

class Shipping extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
			'email' => 'required|email',
			'ship_f_name' => 'required|min:3',
			'ship_l_name' =>'required|min:3',
			'ship_address1' =>'required|min:7',
			'ship_city' =>'required|min:2',
			'ship_state' =>'required|min:2',
			'ship_zip' =>'required|min:5'
	];

	// Don't forget to fill this array
	protected $fillable = [
			'email',
			'phone',
			'ship_f_name',
			'ship_l_name',
			'ship_address1',
			'ship_address2',
			'ship_city',
			'ship_state',
			'ship_zip',
			'cart_id',
			'cart_amt',
			'payment_status',
			'shipped_status',
			'tracking_number',
			
	];

	protected $table = 'shippings';

}