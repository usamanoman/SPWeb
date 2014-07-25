 @extends('layouts.default')

@section('content')
{{HTML::script('/js/ts_picker.js')}}
<?php 
$event=$event['attributes'];
 ?>	
<h1 class="welcome_note">{{ $title }}</h1>
<p class="welcome_note">
	@if(isset($message))
		{{ $message }}
	@endif
</p>
{{Form::open(array('method'=>'PATCH','route' => array('competitions.update', $event['id']),'class'=>'well','name'=>'tstest'))}}
	<ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 	<label>Event Information</label>
    <div class="form-group">
    {{ Form::text('title', $event['title'], array('class'=>'form-control', 'placeholder'=>$event['title'])) }}
    </div>
    <div class="form-group">
    {{ Form::textarea('description', $event['description'], array('class'=>'form-control', 'placeholder'=>'Enter Competition Details')) }}
    </div>
    

    <label>Event Timing</label>
    <div class="form-group" name="tstest">
    {{ Form::text('start_time', null, array('class'=>'form-control', 'placeholder'=>'Please re-select the time','id'=>'calender_field')) }}
	<label>Click this calender icon to select start timing</label>   <a id="calender_btn" href="javascript:show_calendar('document.tstest.start_time', document.tstest.start_time.value);">{{HTML::image('/img/cal.gif')}}</a>

    </div>
    <?php
    	$duration_array=explode(':',$event['duration']);

    ?>
    <label>Duration</label>
    <div class="form-group">
    {{ Form::text('duration_hour', $duration_array[0], array('class'=>'form-control', 'placeholder'=>$duration_array[0])) }}
    </div>
	<div class="form-group">
    {{ Form::text('duration_mints', $duration_array[1], array('class'=>'form-control', 'placeholder'=>$duration_array[1])) }}
    </div>
        


    
    
    {{ Form::submit('Edit Competition', array('class'=>'btn btn-lg btn-danger btn-block'))}}
{{Form::close()}}



@stop