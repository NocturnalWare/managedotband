<?php

class ProductCategory extends \Eloquent {
	
	public static $rules = [
		'name' => 'required|unique:product_categories|min:3',
	];

	protected $fillable = ['name'];

	protected $table = 'product_categories';

	public function products(){
		return $this->hasMany('Product', 'category', 'name');
	}

}