<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public static $rules = array(
		'first_name' => 'required|max:250',
		'last_name' => 'required|max:250',
		'email' => 'required|max:250',
		'password' => 'required|max:250'
	);

	public function balance()
    {
        return $this->hasMany('Balance');
    }

    public function transaction()
    {
        return $this->hasMany('Transaction');
    }
	
	protected $fillable = array('first_name', 'last_name', 'email', 'password');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
