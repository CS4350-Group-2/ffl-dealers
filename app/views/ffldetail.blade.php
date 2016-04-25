@if(Auth::check())
    <?php $user = Auth::user(); ?>
@endif

<?php $rating = 0 ?>
<!DOCTYPE html>
<html>
<head>
    <title>FFL Dealer: {{{$ffl->LicenseName}}}</title>
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
	<div id="info"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.0.1/jquery.rateyo.min.js"></script>
  <p> Add to My Favorites Button</p>
  <p> Location (with google map)</p>
	<iframe
  width="500"
  height="400"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAmVhzpZVe1tVM1KubyT5YKw1rHx8oqfHk
    &q=<?php echo "$ffl->LicenseName,$ffl->PremiseStreet,$ffl->PremiseCity,$ffl->PremiseState" ?>" allowfullscreen>
	</iframe>
	<p><b>Phone/Fax:</b>&nbsp;&nbsp;<?php echo $ffl->VoicePhone ?></p>
  <p><b>Email:</b>&nbsp;&nbsp;<?php echo $ffl->Email ?></p>
  <p><b>Website:</b>&nbsp;&nbsp;<a href="<?php echo $ffl->Website ?>">Website</a></p>
  <p><b>FFL Lic. Type:</b>&nbsp;&nbsp;<?php echo $ffl->LicType ?></p>
  <p><b>FFL Expiration date:</b>&nbsp;&nbsp;<?php echo $ffl->LicXprdte ?></p>

	
	<form action="{{ URL::to('/user/fflid/' . $ffl->id) }}" method="post">
  <button type="submit" name="your_name" value="your_value" class="btn btn-small btn-success">Claim This Dealer</button>
</form>
	<p>  <b>Accepts transfers?:</b>
	<?php 
		if($ffl->AcceptTransfer == 0)
	{
		echo 'Unknown';
	}else
	if($ffl->AcceptTransfer == 1)
	{
		echo 'Yes with Fee';
	}
else
if($ffl->AcceptTransfer == 2)
	{
		echo 'Yes Please Call for Fee';
	}
else
if($ffl->AcceptTransfer == 3)
	{
		echo 'No';
	}
		
		?>
	
	</p>
   <p><b>Bio:</b>&nbsp;&nbsp;{{{$ffl->Bio}}}</p>
   <h2> Deals</h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>

                

            </thead>
            <tbody>
              @foreach($deals as $key => $value)
              <tr>

                <td><a class="btn btn-small btn-success" href="{{ URL::to('ffldetail/' . $value->id) }}">{{ $value->name }}</a> </td>
              </tr>
              @endforeach
            </tbody>
          </table>
  <p> Share: Facebook, Twiter etc...</p>
  <p>  "Add Comment" button followed by list of user comments</p>
  
</div>
<script>
	//initialize the rating on page load
$(function () {
  $("#rateYo").rateYo({
    rating: <?php echo $ffl->Rating ?>,
		precision: 0
  });
 
});

//when the rating is set, attempt to update rating object.	
	$(function () {
  $("#rateYo").rateYo()
              .on("rateyo.set", function (e, data) {
 						
                  	$.ajax({
							url: '/ffldetail/setRating/<?php echo $ffl->id ?>/' + data.rating,
							//data: {
							//	format: 'json',
							//	rating: data.rating
							//},
							//error: function (request, status, error) {
     				  //	alert(request.responseText);
    					//},
							dataType: 'jsonp',
							type: 'POST'
							
						});
						
              });
});
	
	
	
	
</script>
</body>
</html>

