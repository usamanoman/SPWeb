

 @extends('layouts.default')

@section('content')
	
<h1 class="welcome_note">{{ $title }}</h1>
<p class="welcome_note">
	@if(isset($message))
		{{ $message }}
	@endif
</p>
{{Form::open(array('method'=>'PATCH','route' => array('problems.update', $problem['id']) ,'class'=>'well'))}}
	<ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 	<label>Problem Title</label>
    <div class="form-group">
    {{ Form::text('title', $problem['title'], array('class'=>'form-control', 'placeholder'=>'Enter Problem Name')) }}
    </div>
    <label>Problem Content</label>
    <div class="form-group">
    {{ Form::textarea('description', $problem['description'], array('class'=>'form-control', 'placeholder'=>'Enter Problem Description')) }}
    </div>
    

    <label>Sample Input</label>
	<div class="form-group">
    {{ Form::textarea('sampleinput', $problem['sampleinput'], array('class'=>'form-control', 'placeholder'=>'Enter Problem Sample Input')) }}
    </div>
            
	<label>Sample Output</label>
	<div class="form-group">
    {{ Form::textarea('sampleoutput', $problem['sampleoutput'], array('class'=>'form-control', 'placeholder'=>'Enter Problem Sample Output')) }}
    </div>
    
    <label>Select Event</label>
    @if(count($events))
    <select class="form-control" name='event_id'>
        @foreach($events as $event)
            <option value="{{ $event['id'] }}" >{{$event['title']}}</option>
        @endforeach
    </select>
    @else
    No, Event. Please add an event first!
    @endif
    
	

    <br>
    
    
    {{ Form::submit('Create Problem', array('class'=>'btn btn-lg btn-danger btn-block'))}}
{{Form::close()}}



@stop