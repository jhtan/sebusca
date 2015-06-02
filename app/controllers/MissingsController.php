<?php

class MissingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('lost.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $lost = new Lost();
        $lost->name = Input::get('name');
        $lost->last_name = Input::get('last_name');
        $lost->document_number = Input::get('document_number');
        $lost->date_of_birth = Input::get('date_of_birth');
        $lost->clothing = Input::get('clothing');
        $lost->nationality = Input::get('nationality');
        $lost->description = Input::get('description');
        $lost->city_id = 1;
        $lost->country_id = 1;
        $lost->user_id = Auth::id();
        $lost->save();

        $lost = Lost::all();
        return View::make('home', ['lost' => $lost]);

    //    $user = new User;
//    $user->username = Input::get('username');
//    $user->password = Hash::make(Input::get('password'));
//    $user->save();
//    $this->user->create($input);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)	{
    $lost = Lost::find($id);
    return View::make('lost.show', ['lost' => $lost]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
