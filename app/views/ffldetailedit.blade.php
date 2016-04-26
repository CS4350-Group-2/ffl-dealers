
@if(Auth::check())
    <?php $user = Auth::user(); ?>
@endif
<!DOCTYPE html>
<html>
<head>
    <title>FFL Dealer Edit</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

@include('header')
  <h1>Edit {{ $ffl->LicenseName }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($ffl, array('route' => array('ffl.update', $ffl->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('VoicePhone', 'Phone/Fax') }}
        {{ Form::text('VoicePhone', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Email', 'Email') }}
        {{ Form::email('Email', null, array('class' => 'form-control')) }}
    </div>

   <div class="form-group">
        {{ Form::label('Website', 'Website') }}
        {{ Form::text('Website', null, array('class' => 'form-control')) }}
    </div>
  
  <div class="form-group">
        {{ Form::label('Bio', 'Bio') }}
        {{ Form::text('Bio', null, array('class' => 'form-control')) }}
    </div>
  
  <div class="form-group">
        {{ Form::label('AcceptTransfer', 'Transfers') }}
        {{ Form::select('AcceptTransfer', array('0' => 'Select Accepted Transfers', '1' => 'Yes (Fee Charged)', '2' => 'Yes (Potential Fee. Please Call)', '3' => 'No'), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the FFL Dealer!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
    
 
  
  
</div>
</body>
</html>