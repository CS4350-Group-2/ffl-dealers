@if(Auth::check())
    <?php $user = Auth::user(); ?>
@endif
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.0.1/jquery.rateyo.min.css"/>
	<script src="https://code.jquery.com/jquery-1.12.3.min.js"</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.0.1/jquery.rateyo.min.js"></script>
</head>
<body>
<div class="container">

@include('header')

  <h1>
	{{{$ffl->LicenseName}}}   
  </h1>
   
  <!-- Dealer Detail:
	Fill me out with stuff! $ffl has the ffl object in it and should be accessable from this page
  	$deals has an array of Deal objects in it. -->

  <p> Overall user rating and Total number of ratings (5 star scale)</p>
  <div id="rateYo"></div> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.0.1/jquery.rateyo.min.js"></script>
  <p> Add to My Favorites Button</p>
  <p> Location (with google map)</p>
  <p> Phone/Fax</p>
  <p> Email</p>
  <p>  Website</p>
  <p>  FFL Lic. Type</p>
  <p>  FFL Expiration date</p>
  <p>  Is this you? Claim this page (dealer call to action button)</p>
  <p>  Accepts transfers? (Yes + $Fee, Yes + Please Call For $Fee or No)</p>
  <p>  Bio</p>
  <p>  Current deals, promo or ad</p>
  <p> Share: Facebook, Twiter etc...</p>
  <p>  "Add Comment" button followed by list of user comments</p>
  
</div>
<script>
	//Make sure that the dom is ready
	$(function () {
		$("#rateYo").rateYo({
			onSet: function (rating, rateYoInstance) {
      			alert("Rating is set to: " + <?php echo $ffl->Rating ?>);
			},
			rating:	<?php echo $ffl->Rating ?>,
			precision: 0
			
		});
		
	});

</script>
</body>
</html>

