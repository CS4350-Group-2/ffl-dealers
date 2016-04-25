 @if(Auth::check())
<?php $user = Auth::user(); ?> @endif
<!DOCTYPE html>
<html>

<head>
  <title>FFL Dealers</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">

    @include('header')

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>Welcome to our FFL Dealer Page</p>





      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Local Deals</h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>

                

            </thead>
            <tbody>
              @foreach($localdeals as $key => $value)
              <tr>

                <td><a class="btn btn-small btn-success" href="{{ URL::to('ffl/' . $value->id) }}">{{ $value->name }}</a> </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        <div class="col-md-4">
          <h2>Featured Dealers</h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>

             

            </thead>
            <tbody>
              @foreach($featureddealers as $key => $value)
              <tr>

                <td><a class="btn btn-small btn-success" href="{{ URL::to('ffl/' . $value->id) }}">{{ $value->LicenseName }}</a> </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-4">
          <h2>Local Dealers</h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>

                

            </thead>
            <tbody>
              @foreach($localdealers as $key => $value)
              <tr>

                <td><a class="btn btn-small btn-success" href="{{ URL::to('ffl/' . $value->id) }}">{{ $value->LicenseName }}</a> </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>





    </div>
</body>

</html>