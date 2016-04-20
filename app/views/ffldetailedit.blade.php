
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

    
  <h1>
   {{{$ffl->LicenseName}}}
  </h1>
   
    <p>Fill me out with stuff! $ffl has the ffl object in it and should be accessable from this page</p>
    
    <p> Dealer Profile Management (allow registered dealer to edit the following fields)</p>
    <p>  Phone/Fax</p>  
    <p> Email</p> 
    <p> Website</p>
    <p> Accept transfers? (Yes + $Fee, Yes + Please Call For $Fee or No)</p>
    <p>  Bio</p>
    <p>   Current deals, promo or ad    </p>
    
 
  
  
</div>
</body>
</html>