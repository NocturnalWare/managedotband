<?php

class OverlordsController extends \BaseController {

	/**
	 * Display a listing of overlords
	 *
	 * @return Response
	 */
	public function overlord($director){
		switch ($director) {
			case 'viewInventory':
				return View::make('overlords.products.inventory');
			break;
			case 'changeInventory':
				return $this->changeInventory();
			break;
		}
	}

	public function index()
	{
		$products = Product::all();

		return View::make('overlords.index', compact('products'));
	}

	public function showInventory(){

	}
	public function updateInventory(){

	}
	/**
	 * Show the form for creating a new overlord
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('overlords.create');
	}

	/**
	 * Store a newly created overlord in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Overlord::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Overlord::create($data);

		return Redirect::route('overlords.index');
	}

	/**
	 * Display the specified overlord.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$overlord = Overlord::findOrFail($id);

		return View::make('overlords.show', compact('overlord'));
	}

	/**
	 * Show the form for editing the specified overlord.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$overlord = Overlord::find($id);

		return View::make('overlords.edit', compact('overlord'));
	}

	/**
	 * Update the specified overlord in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$overlord = Overlord::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Overlord::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$overlord->update($data);

		return Redirect::route('overlords.index');
	}

	/**
	 * Remove the specified overlord from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Overlord::destroy($id);

		return Redirect::route('overlords.index');
	}

	public function changeInventory(){
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
