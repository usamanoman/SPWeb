 <html>
<head>
	<title>{{ $title }}</title>
	
	{{HTML::style('/css/bootstrap.min.css')}}
	{{HTML::style('/css/style.css')}}
	{{HTML::style('/css/home.css')}}
	{{HTML::script('/js/jquery.min.js')}}
	{{HTML::script('/js/bootstrap.min.js')}}
	
	</style>
</head>
<body>
	@include('layouts.user_navbar')
		
	<div class="container">
		<div class="row home-content">
			<div class="col-lg-6 col-lg-offset-3">
			
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>