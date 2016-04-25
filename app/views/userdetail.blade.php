<?php
$favorites = Favorite::where('userid', '=', $user->id)->get();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Detail</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

@include('header')

<div class="container">

<h1>Edit {{ $user->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('User.update', $user->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('Name', 'Name') }}
        {{ Form::text('Name', $user->name, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Email', 'Email') }}
        {{ Form::email('Email', $user->email, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Password', 'Password') }}
		{{ Form::password('Password') }}
    </div>
	<div>
		{{ Form::label('Subscribe', 'Subscribe') }}
		{{ Form::label('text', Input::old('Subscribe')) }}
		@if (Input::old('Subscribe') === 0)
			{{ Form::label('Subscribe', 'yes') }}
			{{ Form::radio('Subscribe', 'yes') }}
			{{ Form::label('Subscribe', 'no') }}
			{{ Form::radio('Subscribe', 'no', true) }}
		@else
			{{ Form::label('Subscribe', 'yes') }}
			{{ Form::radio('Subscribe', 'yes', true) }}
			{{ Form::label('Subscribe', 'no') }}
			{{ Form::radio('Subscribe', 'no') }}
		@endif
	</div>
    <div class="form-group">
		{{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }}
    </div>


{{ Form::close() }}

</div>
   
<div>
     
  <p>Fill me out with stuff! $user has the User object in it and should be accessable from this page.</p>
  <p>$favorites has an array of Favorite objects in it.</p>
    
  <p>User Profile Management (allow registered user to edit the following fields)</p>
  <p>Email</p>
  <p>Password</p>
  <p>Favorites List</p>
  <p>Subscribe (yes/no)</p>
 
  
  
</div>
</body>
</html>
