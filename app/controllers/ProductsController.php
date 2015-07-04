<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return View::make('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new product
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Product::create($data);

		return Redirect::route('products.index');
	}

	/**
	 * Display the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);

		return View::make('products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		return View::make('products.edit', compact('product'));
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product->update($data);

		return Redirect::route('products.index');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);

		return Redirect::route('products.index');
	}
	public function objectStorage(){
		switch(Input::get('storageType')){
			case 'productCategory':
				return $this->injectProductCategory();
			break;
			case 'updateInventory':
			break;
		}
	}


	public function injectProductCategory(){
		$validator = Validator::make($data = Input::all(), ProductCategory::$rules);
		if ($validator->fails())
		{
			return('failt');
		}
		ProductCategory::create($data);
		return('worked');
	}

	public function updateInventory(){
		$inventory = Inventory::where('product_id', Input::get('id'))->first();
		
		$inventory->xsmall = Input::get('xsmall_inv');
		$inventory->small = Input::get('small_inv');
		$inventory->medium = Input::get('medium_inv');
		$inventory->large = Input::get('large_inv');
		$inventory->xlarge = Input::get('xlarge_inv');
		$inventory->xxlarge = Input::get('xxlarge_inv');
		$inventory->xxxlarge = Input::get('xxxlarge_inv');
		$inventory->onesize = Input::get('onesize_inv');

		$inventory->save();

		return ('success!');
	}


}
