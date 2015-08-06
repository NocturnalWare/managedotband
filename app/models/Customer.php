<?php

class Customer extends \Eloquent {
	protected $rules = [];

	protected $fillable = [
		'username',
		'password',
		'email',
		'contact_id'
	];


	protected $table = 'customers';
}