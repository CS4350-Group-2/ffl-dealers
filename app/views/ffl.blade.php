
@if(Auth::check())
    <?php $user = Auth::user(); ?>
@endif
<!DOCTYPE html>
<html>
<head>
    <title>FFL Dealers</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

@include('header')

  <h1>
    Dealers
  </h1>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>fflid</td>
            <td>LicenseName</td>
            <td>LicType</td>
            <td>LicXprdte</td>
            <td>PremiseStreet</td>
            <td>PremiseCity</td>
            <td>PremiseState</td>
            <td>PremiseZipCode</td>
            <td>VoicePhone</td>
            <td>Website</td>
            <td>Email</td>
            <td>AcceptTransfer</td>
          
          
          
    </thead>
    <tbody>
    @foreach($ffls as $key => $value)
        <tr>
            <td>{{ $value->fflid }}</td>
            <td>{{ $value->LicenseName }}</td>
            <td>{{ $value->LicType }}</td>
            <td>{{ $value->LicXprdte }}</td>
            <td>{{ $value->PremiseStreet }}</td>
            <td>{{ $value->PremiseCity }}</td>
            <td>{{ $value->PremiseState }}</td>
            <td>{{ $value->PremiseZipCode }}</td>
            <td>{{ $value->VoicePhone }}</td>
            <td>{{ $value->Website }}</td>
            <td>{{ $value->Email }}</td>
            <td>{{ $value->AcceptTransfer }}</td>
          

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('ffldetail/' . $value->fflid) }}">Show this FFL Dealer</a>



            </td>
        </tr>
    @endforeach
    </tbody>
</table>

  
  
  
</div>
</body>
</html>