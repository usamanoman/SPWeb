 @extends('layouts.default')

@section('content')
{{HTML::script('/js/ts_picker.js')}}
	
<h1 class="welcome_note">{{ $title }}</h1>
<p class="welcome_note">
	@if(isset($message))
		{{ $message }}
	@endif
</p>
{{Form::open(array('method'=>'POST','url'=>'competitions','class'=>'well','name'=>'tstest'))}}
	<ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 	<label>Event Information</label>
    <div class="form-group">
    {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Enter Competition Name')) }}
    </div>
    <div class="form-group">
    {{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Enter Competition Details')) }}
    </div>
    

    <label>Event Timing</label>
    <div class="form-group" name="tstest">
    {{ Form::text('start_time', null, array('class'=>'form-control', 'placeholder'=>'Enter Start Time','id'=>'calender_field')) }}
	<label>Click this calender icon to select start timing</label>   <a id="calender_btn" href="javascript:show_calendar('document.tstest.start_time', document.tstest.start_time.value);">{{HTML::image('/img/cal.gif')}}</a>

    </div>
    <label>Duration</label>
    <div class="form-group">
    {{ Form::text('duration_hour', null, array('class'=>'form-control', 'placeholder'=>'Enter Hours')) }}
    </div>
	<div class="form-group">
    {{ Form::text('duration_mints', null, array('class'=>'form-control', 'placeholder'=>'Enter Minutes')) }}
    </div>
        


    
    
    {{ Form::submit('Create Competition', array('class'=>'btn btn-lg btn-danger btn-block'))}}
{{Form::close()}}



@stop