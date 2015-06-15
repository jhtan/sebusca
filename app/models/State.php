<?php
/**
 * Created by PhpStorm.
 * User: Cechus
 * Date: 14/06/2015
 * Time: 22:23
 */

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class State extends Eloquent implements UserInterface, RemindableInterface {

    public $timestamps = false;

    public $errors;

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'state';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}
