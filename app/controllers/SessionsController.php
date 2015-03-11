<?php
/**
 * Created by PhpStorm.
 * User: jhtan
 * Date: 12/2/14
 * Time: 11:51 AM
 */

class SessionsController extends BaseController {
  public function create() {
    if(Auth::check()) return Redirect::to('/admin');

    return View::make('sessions.create');
  }

  public function store() {
    if (Auth::attempt(Input::only('email', 'password'))) {
      $lost = Lost::all();
      return View::make('home', ['lost' => $lost]);
    }

    return Redirect::back()->withInput();
  }

  public function destroy() {
    Auth::logout();
    $lost = Lost::all();
    return View::make('home', ['lost' => $lost]);
  }
}