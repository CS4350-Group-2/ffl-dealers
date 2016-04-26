<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::resource('ffl', 'FFLController');

Route::resource('Favorite', 'FavoriteController');

Route::resource('User', 'UserController');

// route to show the secure page
Route::get('secure', array('uses' => 'HomeController@showSecure'));

// route to show the login form
Route::get('/', array('uses' => 'HomeController@showLogin'));

Route::get('login', array('uses' => 'HomeController@showLogin'));


Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));

// used for "Claim this dealer"
Route::post('user/fflid/{fflid}', function($fflid)
{
    
  if (Auth::check())
	{
   	$user = Auth::user();
		
		$user->fflid = $fflid;
		
		$user->save();
		
		$app = app();
    $controller = $app->make('FFLController');
    return $controller->callAction('edit', $parameters = array($fflid));
		
  }
  else
  {
    return View::make('login');
  }
  
   
});





//route used for ffl search
Route::get('ffl', function()
{
    
  if (Auth::check())
	{
     $q = Input::get('name');
  
  if ($q)
        $ffls = ffl::where('LicenseName', 'LIKE', '%'.$q.'%')->get();
    else
        $ffls = ffl::all();

  
    return View::make('ffl')
        ->with('ffls', $ffls);
  }
  else
  {
    return View::make('login');
  }
  
   
});



Route::post('ffldetail/setRating/{fflid}/{newrating}', function($fflid,$newrating)  
{
		if (Auth::check() )
	{
		$user = Auth::user();
		$ffl = ffl::where('id', '=', $fflid)->first();
		$existingRating = Rating::where('uid', '=' , $user->id)
			->where('fflid', '=', $fflid)
			->first();
		
		//Update user ratings
		if( !isset($existingRating))
		{
			
			$rating = new Rating;
			$rating->uid = $user->id;
			$rating->fflid = $fflid;
			$rating->rating = $newrating;
	
			$rating->save();
		}
		else
		{
			$rating = Rating::find($existingRating->id);
			$rating->rating = $newrating;

			$rating->save();
		}

		//Update ffl total rating
		$ratings = Rating::where('fflid', '=', $fflid)->get();
		$sum = 0;
		$count = 0;
		foreach ($ratings as $rating)
		{
			$sum += $rating->rating;
			$count++;
		}	

		$ffl->Rating = $sum / $count;

		$ffl->save();
	
	
	
	}	//this was missing before
});



