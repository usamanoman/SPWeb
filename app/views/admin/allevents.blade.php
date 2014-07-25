 @extends('layouts.default_wide')

@section('content')
<h1 class="welcome_note">{{$title}}</h1>
<p class="welcome_note">
	@if(isset($message))
		{{ $message }}
	@endif
</p>
<style type="text/css">
    
</style>
@if(count($events))
<table class="table table-bordered desc_wide">
<thead>
    <tr>
        <th>Name</th>
        <th >Description</th>
        <th>Start Time</th>
        <th>Duration</th>
        <th>Edit</th>
        <th>Remove</th>
        
    </tr>
</thead>
<tbody>
    @foreach($events as $event)
    <tr>
        <td>{{$event['title']}}</td>
        <td >{{$event['description']}}</td>
        <td>{{$event['start_time']}}</td>
        <td>{{$event['duration']}}</td>
        <td>{{ link_to_route('competitions.edit', 'Edit', array($event['id']), array('class' => 'btn btn-info')) }}</td>
        <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('competitions.destroy', $event['id']))) }}
        {{ Form::submit('Delete', array('class' =>
        'btn btn-danger')) }}
        {{ Form::close() }}
        </td>
        
    </tr>
    @endforeach

</tbody>
</table>
@endif

@stop