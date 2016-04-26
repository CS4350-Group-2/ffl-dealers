
@if(Auth::check())
    <?php $user = Auth::user(); ?>
@endif
<!DOCTYPE html>
<html>
<head>
    <title>FFL Dealers</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      #map {
        height: 100%;
      }
    </style>
     <script>
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 10
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB0la4mWM6BcoqQ5tSVie-WBmZAkGSR_8&callback=initMap">
    </script>
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
            <td>{{ $value->lid }}</td>
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
                <a class="btn btn-small btn-success" href="{{ URL::to('ffl/' . $value->id) }}">Show this FFL Dealer</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
  <div id="map"></div>
</div>
</body>
</html>