<?php
/**
 * Created by PhpStorm.
 * User: jhtan
 * Date: 12/2/14
 * Time: 4:26 PM
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Lost extends Eloquent implements UserInterface, RemindableInterface {

//  protected $fillable = ['username', 'email', 'password'];

//  public static $rules = [
//    'username' => 'required',
//    'email' => 'required',
//    'password' => 'required'
//  ];

//  public $errors;

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
//	protected $table = 'missings';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
  protected $hidden = array('password', 'remember_token');

//  public function isValid() {
//    $validation = Validator::make( $this->attributes, static::$rules );
//
//    if($validation->passes()) {
//      return true;
//    }
//
//    $this->errors = $validation->messages();
//    return false;
//  }

}
