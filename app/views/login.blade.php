<!-- app/views/login.blade.php -->
<!doctype html>
<html>
<head>
<title>FFL Login</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>

    {{ Form::open(array('url' => 'login')) }}
    <h1>Login</h1>

    <!-- if there are login errors, show them here -->
    <p>

        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </p>


        <div class="form-group">
          {{ Form::label('email', 'Email Address:') }}
          {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
        </div>



        <div class="form-group">
          {{ Form::label('password', 'Password:') }}
          {{ Form::password('password') }}
        </div>


    <p>{{ Form::submit('Submit!') }}</p>
    {{ Form::close() }}
  </body>
</html>
     
