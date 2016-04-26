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
        return View::make('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
			
			  $rules = array(
					'name' => 'required|min:2',
					'username' => 'required',
          'email'    => 'required|email', // make sure the email is an actual email
					'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('User/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = new User;
            
					  $user->username = Input::get('username');
            $user->email      = Input::get('email');
					  $user->name =     Input::get('name');
            $user->password =  Hash::make(Input::get('password'));
            $user->save();

            // redirect
            Session::flash('message', 'Successfully created User!');
            return Redirect::to('login');
				}
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
