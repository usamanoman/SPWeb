 <?php


 class UserController extends BaseController{
 	public function index()
 	{
 		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user = $user['attributes'];
 			if($user['permissions'] == 1){
 				$teams=User::all();
 				return View::make('admin.allteams')->with(array('title'=>'All Teams','user'=>$user,'teams'=>$teams));
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
 				return View::make('admin.newteam')->with(array('title'=>'Admin Panel','user'=>$user,'events'=>$events));
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

 	public function panel(){
 		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				return View::make('admin.home')->with(array('title'=>'Admin Panel','user'=>$user));
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


 	public function store(){
 		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$inputs =  Input::all();
 				User::create(
 					array(
 						'email'=>$inputs['email'],
 						'password'=>Hash::make($inputs['password']),
 						'first_name'=>$inputs['first_name'],
 						'last_name'=>$inputs['last_name'],
 						'first_name2'=>$inputs['first_name2'],
 						'last_name2'=>$inputs['last_name2'],
 						'permissions'=>0,
 						'teamname'=>$inputs['teamname'],
 						'activated'=>1,
 						'event_id'=>$inputs['event_id']
 					)
 				);
 				$events=Competition::all();
 				
 				return View::make('admin.newteam')->with(array('title'=>'Add Team','user'=>$user,'message'=>'Successfully Added','events'=>$events));
 				
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

 	public function new_admin()
 	{
 		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				return View::make('admin.addadmin')->with(array('title'=>'Add Admin','user'=>$user));
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



 	public function storeadmin(){
 		if(Sentry::check()){
 			$user = Sentry::getUser();
 			$user=$user['attributes'];
 			if($user['permissions'] == 1){
 				$inputs =  Input::all();
 				User::create(
 					array(
 						'email'=>$inputs['email'],
 						'password'=>Hash::make($inputs['password']),
 						'first_name'=>$inputs['first_name'],
 						'last_name'=>$inputs['last_name'],
 						'permissions'=>1,
 						'teamname'=>$inputs['teamname'],
 						'activated'=>1 							
 					)
 				);
 				return View::make('admin.addadmin')->with(array('title'=>'Add Admin','user'=>$user,'message'=>'Successfully Added'));
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


 	public function logout(){
 		Sentry::logout();
 		return Redirect::to('/');
 	}
 	

 }