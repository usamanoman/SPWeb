<html>
<head>
	<title>Speed Programming Web</title>
	{{HTML::style('/css/bootstrap.min.css')}}
	{{HTML::style('/css/style.css')}}
	{{HTML::style('/css/home.css')}}
	{{HTML::script('/js/jquery.min.js')}}
	{{HTML::script('/js/bootstrap.min.js')}}
	
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
	
	</style>-->
</head>
<body>

	<div class="container">
		<div class="row home-content">
			<div class="col-lg-8">
				<div class="img-keyboard">
					{{HTML::image('/img/Key.png')}}

				</div>
				<div class="home-taglines">
					<h1>KEEP CALM</h1>
					<h1>AND</h1>
					<h1>CODE</h1>
				</div>
			</div>
			<div class="col-lg-4">
				
				 <div class="panel-body">
              		<?php 
              		if(isset($message)) 
              			echo  $message;
					?>

                	{{ Form::open(array('url'=>'login', 'class'=>'form-signup')) }}
					    <h2 class="form-signup-heading">Login</h2>
					 
					    <ul>
					        @foreach($errors->all() as $error)
					            <li>{{ $error }}</li>
					        @endforeach
					    </ul>
					 	<div class="form-group">
					    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address','name'=>'email')) }}
					    </div>
					    <div class="form-group">
					    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','name'=>'password')) }}
					    </div>
					    {{ Form::submit('Login', array('class'=>'btn btn-lg btn-danger btn-block'))}}
					{{ Form::close() }}
            	</div>

			</div> 
		</div>
	</div>
</body>
</html>