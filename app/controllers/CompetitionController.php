<?php


class CompetitionController extends BaseController{
	public function index(){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user = $user['attributes'];
 			if($user['permissions'] == 1){
 				$events=Competition::all();
 				return View::make('admin.allevents')->with(array('title'=>'All Competitions','user'=>$user,'events'=>$events));
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
 			$user = $user['attributes'];
 			if($user['permissions'] == 1){
 				$events=Competition::all();
 				return View::make('admin.newevent')->with(array('title'=>'New Competition','user'=>$user));
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


	public function store (){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$inputs =  Input::all();
 				Competition::create(array(
					'title'=>Input::get('title'),
					'description'=>Input::get('description'),
					'start_time'=>Input::get('start_time'),
					'duration'=>Input::get('duration_hour'). ":" . Input::get('duration_mints')
				));
 				return View::make('admin.newevent')->with(array('title'=>'New Competition','user'=>$user,'message'=>'Successfully Created'));
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
 				Competition::find($id)->delete();
					return Redirect::route('competitions.index');
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




 	public function edit($id){
 		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$event=Competition::find($id);
				return View::make('admin.editcompetition')->with(array('title'=>'Edit Competition','user'=>$user,'event'=>$event));
	 		
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





 	public function update ($id){
		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$inputs =  Input::all();
 				$event=Competition::find($id);
 				$event->title=Input::get('title');
 				$event->description=Input::get('description');
 				$event->start_time=Input::get('start_time');
 				$event->duration=Input::get('duration_hour'). ":" . Input::get('duration_mints');
 				$event->save();
 				$events=Competition::all();
 				return View::make('admin.allevents')->with(array('title'=>'All Competition','user'=>$user,'events'=>$events));
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




}