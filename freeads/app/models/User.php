<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = ['password', 'remember_token'];

	public static $rules = [
		'username'=>'required|unique:users|alpha|min:2',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,12'
	];

	public static $rules_update = [
			'username'   => 'required',
			'email'      => 'required|email',
			'password'=>'alpha_num|between:6,12|confirmed',
			'password_confirmation'=>'alpha_num|between:6,12'
	];

	public function authorized(){
		return ($this->id == Auth::user()->id || Auth::user()->id == 1);
	}
}
