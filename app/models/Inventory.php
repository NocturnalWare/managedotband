<?php

class Inventory extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = 
	[
			'product_id',
			'xsmall',
			'small',
			'medium',
			'large',
			'xlarge',
			'xxlarge',
			'xxxlarge',
			'onesize',
	];

	protected $table = 'inventories';

	public function product()
	{
		return $this->belongsTo('Product');
	}
}