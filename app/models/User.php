<?php

class User extends Eloquent /*implements UserInterface, RemindableInterface */{

	protected $guarded = array('id');
	//protected $fillable = array();
	/*public static $rules=array(
		'username' =>'required|alpha_dash|min:6',
		'password' =>'required|alpha_num|between:6,20',
		'email' =>'required|email',
		'name' =>'required|between:6,20'	
	);*/
	
}
