<?php

class HomeController extends BaseController {

	

	public function index()
	{
		return View::make('home.index');
	}

	public function login()
	{
     	
     	$inputs = Input::all();
     	$rules=array(
			'password' =>'required|alpha_num|between:4,20',
			'email' =>'required|email'
		);
		$validation=Validator::make($inputs,$rules);
		$credentials=array(
			'email'=>$inputs['email'],
			'password'=>$inputs['password']
		);
		if($validation->passes()){
			// Try to authenticate the user
			$user = Sentry::authenticate($credentials, false);

			if(Sentry::check())
			{ 
				return Redirect::to('users/panel')->with('user',$user);
			}else{
				return Redirect::to('/')->with('message',"Couldn't find such record.");
			}
		}
		else{
			return Redirect::to('/')->withInput()->withErrors($validation)->with('message','Some errors occured.');
		}

	}

}
