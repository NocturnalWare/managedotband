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
		
	public function inventories()
	{
		return($this->hasOne('Inventory', 'product_id'));
	}

	public function Sizes($size)
	{
		return Product::where('id', $this->id)->pluck($size);
	}

	public function categories(){
		return $this->belongsTo('ProductCategory', 'name', 'category');
	}
}