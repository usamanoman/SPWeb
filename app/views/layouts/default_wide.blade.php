 <html>
<head>
	<title>{{ $title }}</title>
	
	{{HTML::style('/css/bootstrap.min.css')}}
	{{HTML::style('/css/style.css')}}
	{{HTML::style('/css/home.css')}}
	{{HTML::script('/js/jquery.min.js')}}
	{{HTML::script('/js/bootstrap.min.js')}}
	{{HTML::script('/js/script.js')}}
	
	
	</style>
</head>
<body>
	@include('layouts.admin_navbar')
		
	<div class="container-fluid">
		<div class="row home-content">
			<div class="col-lg-12">
			
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>