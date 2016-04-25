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