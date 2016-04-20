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



Route::get('ffldetail/edit/', function()
{
  if (Auth::check())
	{
     $user = Auth::user();
    
    if ($user->fflid > 0)
    {    
       $ffl = ffl::where('fflid', '=', $user->fflid)->first();
			
			 if (isset($ffl) )
			 {
				 	return View::make('ffldetailedit')->with('ffl',$ffl);
				 
			 }
			 else
			 {
					echo 'Error: Invalid FFLID for this user!!';
			 }
    }
    else
    {
      return View::make('login');
    }
    
  }
  else
  {
    return View::make('login');
  } 
});


 Route::get('secure', array('uses' => 'HomeController@showSecure'));

       

// route to show the login form
Route::get('/', array('uses' => 'HomeController@showLogin'));

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to show the secure page
//

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));


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


Route::get('ffldetail/{fflid}', function($fflid)
{
  if (Auth::check())
	{
    $ffl = ffl::where('fflid', '=', $fflid)->first();
    
    $deals = Deal::where('fflid', '=', $fflid)->get();
    
    
    return View::make('ffldetail')
        ->with('ffl', $ffl)
        ->with('deals', $deals);
  }
  else
  {
    return View::make('login');
  } 
});



Route::get('userdetail/', function()
{
  if (Auth::check())
	{
    
    $user = Auth::user();
    
    $favorites = Favorite::where('userid', '=', $user->id)->get();
    return View::make('userdetail')
      ->with('favorites',$favorites);
    
  }
  else
  {
    return View::make('login');
  }
        
});


