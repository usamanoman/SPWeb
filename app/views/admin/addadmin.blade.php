 @extends('layouts.default')

@section('content')
<h1 class="welcome_note">Welcome <?php echo $user['first_name'] . " " . $user['last_name']; ?></h1>
<p class="welcome_note">
	@if(isset($message))
		{{ $message }}
	@endif
</p>
{{Form::open(array('method'=>'POST','url'=>'users/storeadmin','class'=>'well'))}}
	<ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 	<label>User Information</label>
    <div class="form-group">
    {{ Form::text('teamname', null, array('class'=>'form-control', 'placeholder'=>'Enter Admin User Name')) }}
    </div>
    <div class="form-group">
    {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Admin Email')) }}
    </div>
    <div class="form-group">
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Enter Admin Password')) }}
    </div>


    <label>First Member Information</label>
    <div class="form-group">
    {{ Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'Enter First Name')) }}
    </div>
    <div class="form-group">
    {{ Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'Enter Last Name')) }}
    </div>
    
    {{ Form::submit('Create Account', array('class'=>'btn btn-lg btn-danger btn-block'))}}
{{Form::close()}}
@stop