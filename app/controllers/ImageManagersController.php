<?php

class ImageManagersController extends \BaseController {

	/**
	 * Display a listing of imagemanagers
	 *
	 * @return Response
	 */
	public function index()
	{
		$imagemanagers = Imagemanager::all();

		return View::make('imagemanagers.index', compact('imagemanagers'));
	}

	/**
	 * Show the form for creating a new imagemanager
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('imagemanagers.create');
	}

	/**
	 * Store a newly created imagemanager in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Imagemanager::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Imagemanager::create($data);

		return Redirect::route('imagemanagers.index');
	}

	/**
	 * Display the specified imagemanager.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$imagemanager = Imagemanager::findOrFail($id);

		return View::make('imagemanagers.show', compact('imagemanager'));
	}

	/**
	 * Show the form for editing the specified imagemanager.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$imagemanager = Imagemanager::find($id);

		return View::make('imagemanagers.edit', compact('imagemanager'));
	}

	/**
	 * Update the specified imagemanager in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$imagemanager = Imagemanager::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Imagemanager::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$imagemanager->update($data);

		return Redirect::route('imagemanagers.index');
	}

	/**
	 * Remove the specified imagemanager from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Imagemanager::destroy($id);

		return Redirect::route('imagemanagers.index');
	}

}
