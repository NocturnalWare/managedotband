<?php

class OverlordsController extends \BaseController {

	/**
	 * Display a listing of overlords
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return View::make('overlords.index', compact('products'));
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

}
