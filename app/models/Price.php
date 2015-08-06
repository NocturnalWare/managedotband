<?php

class Price extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
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

	protected $table = 'prices';
	

	public function prices(){
		return $this->belongsTo('Product');
	}
}