<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Route::get('/', 'PagesController@home');
//Route::get('/about', 'PagesController@about');
//
//Route::get('users', function () {
//  $users = User::all(); // select * from users
//  $user = User::find(1); // find user with id 1
//
//  return $user->email;
//});

//Route::get('/', function () {

  // First tests
//  $users = DB::TABLE('users')->get();
//  return $users;

//  $user = DB::TABLE('users')->find(0);
//  $user = DB::TABLE('users')->where('username', '!=', 'jhtan')->get();

//  $user = User::where('username', '!=', 'o_O')->get();
//  $user = User::all();

//  dd($user);
//  return $user->username;
//  return $user;


  // Create a new user;
//  $user = new User;
//  $user->username = 'ella';
//  $user->password = Hash::make('mrl');
//  $user->save();

  // Another way to create a user
//  User::create([
//    'username' => 'she',
//    'password' => Hash::make('glca')
//  ]);

  // Update an user.
//  $user = User::find(2);
//  $user->username = 'updated meh';
//  $user->save();

  // Delete an user.
//  $user = User::find(3);
//  $user->delete();

  // Order asc
//  return User::orderBy('username', 'asc')->take(3)->get();
//});

/*
 * List users example
 */
//Route::get('users', function () {
//  $users = User::all();
//
////  return View::make('users/index')->with('users', $users);
////  return View::make('users/index')->withUsers($users);
//  return View::make('users.index', ['users' => $users]);
//});

/*
 * Detail some user, example.
 */
//Route::get('users/{username}', function($username) {
//  $user = User::whereUsername($username)->first();
//  return View::make('users.show', ['user' => $user]);
//});


// Routes the index and detail pages.
//Route::get('users', 'UsersController@index');
//Route::get('users/{username}', 'UsersController@show');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('register', 'UsersController@create');

Route::resource('sessions', 'SessionsController');

Route::get('/', function () {
  $lost = Lost::all();
  return View::make('home', ['lost' => $lost]);
});

Route::resource('users', 'UsersController');
Route::resource('lost', 'MissingsController');

Route::get('admin', function () {
  return 'Admin Page';
})->before('auth');