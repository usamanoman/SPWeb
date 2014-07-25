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
@if(count($teams))
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
    @foreach($teams as $team)
    <tr>
        <td>{{$team['teamname']}}</td>
        <td >{{$team['email']}}</td>
        <td>{{$team['first_name']}}</td>
        <td>{{$team['last_name']}}</td>
        <td>{{ link_to_route('users.edit', 'Edit', array($team['id']), array('class' => 'btn btn-info')) }}</td>
        <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $team['id']))) }}
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