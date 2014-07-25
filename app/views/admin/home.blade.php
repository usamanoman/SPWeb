@extends('layouts.default')

@section('content')
<h1 class="welcome_note">Welcome <?php echo $user['first_name'] . " " . $user['last_name']; ?></h1>
@stop


