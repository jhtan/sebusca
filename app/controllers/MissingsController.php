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
        $lost->date_of_birth_2 =  Input::get('date_of_birth');
        $lost->age = Input::get('age');
        $lost->sex =  Input::get('sex');
        $lost->height =  Input::get('height');
        $lost->weight =  Input::get('weight');
        $lost->eyes=  Input::get('eye');
        $lost->hair=  Input::get('hair');
        $lost->missing_sincedate=  Input::get('missingsince');
        $lost->missing_place=  Input::get('place');
        $lost->clothing = Input::get('clothing');
        $lost->description = Input::get('description');
        $lost->latitude = Input::get('lat');
        $lost->longitude = Input::get('lng');
        $lost->city_id = 1;
        $lost->country_id = 1;
        $lost->user_id = Auth::id();


        $claimsImagesPublicUrl = 'images/losts/';
        $claimsImagesFolder = public_path() . '/' . $claimsImagesPublicUrl;

        if(INPUT::HasFile('image')) {
            $file_name = Auth::id() . $lost->id . time() . '.' . Input::file('image')->getClientOriginalExtension();
            // Saving the image and updating the Claim object.
            Input::file('image')->move($claimsImagesFolder, $file_name);
            $lost->photo_url = $claimsImagesPublicUrl . $file_name;
        }else{
            $lost->photo_url='null';
        }




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
