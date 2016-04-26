<?php
$favorites = Favorite::where('userid', '=', $user->id)->leftJoin('ffls','favorites.fflid', '=','ffls.id')->get();

?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>User Detail</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>

	<body>
		@include('header')

		<div class="container">
			<h1>Edit {{ $user->name }}</h1>

			<!-- if there are creation errors, they will show here -->
			{{ HTML::ul($errors->all()) }} {{ Form::model($user, array('route' => array('User.update', $user->id), 'method' => 'PUT')) }}

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
				{{ Form::label('Subscribed', 'Subscribed') }} 
				@if ($user->subscribed === '0') 
					{{ Form::label('Subscribed', 'yes') }} 
					{{ Form::radio('Subscribed', '1') }} 
					{{ Form::label('Subscribed', 'no') }} 
					{{ Form::radio('Subscribed', '0', true) }} 
				@else 
					{{ Form::label('Subscribed', 'yes') }} 
					{{ Form::radio('Subscribed', '1', true) }} 
					{{ Form::label('Subscribed', 'no') }} 
					{{ Form::radio('Subscribed', '0') }} 
				@endif
			</div>
			<div class="form-group">
				{{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }}
			</div>

			{{ Form::close() }}
		</div>

		<div id="Favorites">

			<h1>Favorite Dealers</h1> 
			@foreach($favorites as $key => $value)
			<p>
				<a class="btn btn-small btn-success" href="{{ URL::to('ffl/' . $value->fflid) }}">{{ $value->LicenseName }}</a>
			</p>
			@endforeach

		</div>

	</body>

	</html>
