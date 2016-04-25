<?php

class UserController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       
      if (Auth::check())
      {
         $user = Auth::user();
          
          if ($user->id == $id)
          {
             $favorites = Favorite::where('userid', '=', $id)->get();
             return View::make('userdetail')
            ->with('favorites',$favorites)->with('user',$user);
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


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)                                                                                                                                                                                                       
	{                                                                                                                                                                                                                                 

		$user = ffl::where('id', '=', $id)->first();                                                                                                                                                                      
		$user->Email = Input::get('Email');                                                                                                                                                                                   
		$user->Password = Input::get('Password');                                                                                                                                                                                  
		$user->Subscribe = Input::get('Subscribe');
		$user->save();                                                                                                                                                                                                             

		Session::flash('message', 'Successfully updated User!');                                                                                                                                                            

		// TODO: Figure out where to redirect after editing user.
		return Redirect::to('ffl');                                                                                                                                                                                               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
