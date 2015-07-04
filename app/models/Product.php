<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'name',
		'description',
		'category',
		'price',
		'paypal',
		'active',
		'onsale',
		'upcomming',
		'preorder',
		'xsmall',
		'small',
		'medium',
		'large',
		'xlarge',
		'xxlarge',
		'xxxlarge',
		'onesize',
		'main_image',
	];


	protected $table = 'products';
}