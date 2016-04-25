<?php

class FFLController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
          
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
      if (Auth::check())
      {
        $ffl = ffl::where('id', '=', $id)->first();

        $deals = Deal::where('fflid', '=', $id)->get();


        return View::make('ffldetail')
            ->with('ffl', $ffl)
            ->with('deals', $deals);
      }
      else
      {
        return View::make('login');
      } 
      
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

        if ($user->fflid > 0)
        {    
           $ffl = ffl::where('id', '=', $id)->first();
          
           if (isset($ffl) && $ffl->id == $user->fflid )
           {
              return View::make('ffldetailedit')->with('ffl',$ffl);

           }
           else
           {
              echo 'Error: Invalid FFLID!';
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
 
            $ffl =   $ffl = ffl::where('id', '=', $id)->first();
            $ffl->VoicePhone      = Input::get('VoicePhone');
            $ffl->Email      = Input::get('Email');
            $ffl->Website   = Input::get('Website');
            $ffl->AcceptTransfer  = Input::get('AcceptTransfer');
            $ffl->Bio  = Input::get('Bio');
            $ffl->save();

   
            Session::flash('message', 'Successfully updated FFL Dealer!');
            return Redirect::to('ffl');
       // }
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