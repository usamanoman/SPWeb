<?php


class ProblemController extends BaseController{

	public function index(){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user = $user['attributes'];
 			if($user['permissions'] == 1){
 				$problems=Problem::all();
 				return View::make('admin.allproblems')->with(array('title'=>'All Problems','user'=>$user,'problems'=>$problems));
	 		}
	 		else if($user['permissions'] == 0)
	 		{
	 			return Redirect::to('users/panel');
	 		}
	 		else {
	 			return Redirect::to('logout');
	 		}
	 	}
	 	else{
	 		return Redirect::to('logout');
	 	}
 		
	}
	public function create(){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$events=Competition::all();
 				return View::make('admin.newproblem')->with(array('title'=>'Add Problem','user'=>$user,'events'=>$events));
	 		}
	 		else if($user['permissions'] == 0)
	 		{
	 			return Redirect::to('users/panel');
	 		}
	 		else {
	 			return Redirect::to('logout');
	 		}
	 	}
	 	else{
	 		return Redirect::to('logout');
	 	}
 		
 		
	}
	public function store(){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$inputs =  Input::all();
 				Problem::create(array(
					'title'=>Input::get('title'),
					'description'=>Input::get('description'),
					'sampleinput'=>Input::get('sampleinput'),
					'sampleoutput'=>Input::get('sampleoutput'),
					'event_id'=>Input::get('event_id')
				));
				$events=Competition::all();
 				return View::make('admin.newproblem')->with(array('title'=>'Add Problem','user'=>$user,'events'=>$events,'message'=>'Successfully Created'));
	 		}
	 		else if($user['permissions'] == 0)
	 		{
	 			return Redirect::to('logout');
	 		}
	 		else {
	 			return Redirect::to('logout');
	 		}
	 	}
	 	else{
	 		return Redirect::to('logout');
	 	}
	}
	public function edit($id){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$problem=Problem::find($id);
				$events=Competition::all();
 				return View::make('admin.editproblem')->with(array('title'=>'Edit Problem','user'=>$user,'problem'=>$problem,'events'=>$events));
	 		
			}
	 		else if($user['permissions'] == 0)
	 		{
	 			return View::make('users.home')->with(array('title'=>'User Panel','user'=>$user));
	 		}
	 		else {
	 			return Redirect::to('logout');
	 		}
	 	}
	 	else{
	 		return Redirect::to('logout');
	 	}
	}
	public function update($id){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$inputs =  Input::all();
 				$problem=Problem::find($id);
 				$problem->title=Input::get('title');
 				$problem->description=Input::get('description');
 				$problem->sampleinput=Input::get('sampleinput');
 				$problem->sampleoutput=Input::get('sampleoutput');
 				$problem->save();
 				$problems=Problem::all();
 				return View::make('admin.allproblems')->with(array('title'=>'All Problems','user'=>$user,'problems'=>$problems));
	 		}
	 		else if($user['permissions'] == 0)
	 		{
	 			return Redirect::to('logout');
	 		}
	 		else {
	 			return Redirect::to('logout');
	 		}
	 	}
	 	else{
	 		return Redirect::to('logout');
	 	}
	}
	public function destroy($id){
 		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				Problem::find($id)->delete();
					return Redirect::route('problems.index');
	 		}
	 		else if($user['permissions'] == 0)
	 		{
	 			return View::make('users.home')->with(array('title'=>'User Panel','user'=>$user));
	 		}
	 		else {
	 			return Redirect::to('logout');
	 		}
	 	}
	 	else{
	 		return Redirect::to('logout');
	 	}
 	}
}