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
@if(count($problems))
<table class="table table-bordered desc_wide">
<thead>
    <tr>
        <th>Name</th>
        <th >Description</th>
        <th>Sample Input</th>
        <th>Sample Output</th>
        <th>Edit</th>
        <th>Remove</th>
        
    </tr>
</thead>
<tbody>
    @foreach($problems as $problem)
    <tr>
        <td>{{$problem['title']}}</td>
        <td >{{$problem['description']}}</td>
        <td>{{$problem['sampleinput']}}</td>
        <td>{{$problem['sampleoutput']}}</td>
        <td>{{ link_to_route('problems.edit', 'Edit', array($problem['id']), array('class' => 'btn btn-info')) }}</td>
        <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('problems.destroy', $problem['id']))) }}
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