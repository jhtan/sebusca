<?php

class SeenPeopleController extends \BaseController {

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
        return View::make('seenPeople.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        date_default_timezone_set('America/La_Paz');//revisar
        $seen_people = new SeenPeople();
        $seen_people->date=new DateTime('now');
        $seen_people->user_id=Auth::id();
        $seen_people->losts_id=Input::get('losts_id');
        $seen_people->description=Input::get('description');
        $seen_people->type=Input::get('type');
        $seen_people->save();
        $lost = Lost::all();
        return View::make('home', ['lost' => $lost]);


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $seen_people= SeenPeople::All();
        $seen_people->sortByDesc('id');//or date
        $user= User::All();
        $lost=Lost::All();
        return View::make('seenPeople.show', ['seenPeople' => $seen_people, 'user'=>$user,'lost'=>$lost]);
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