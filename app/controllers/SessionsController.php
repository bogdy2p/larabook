<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

        public function __construct(SignInForm $signInForm) {
            $this->beforeFilter('guest', ['except' => 'destroy']);
            $this->signInForm = $signInForm;
        }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{       
            // We should not be able to see a login page if the user is allready logged in
                
            
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
                //WHEN POSTING THE LOGIN
		//
                // we want to fetch the input from the form
                $input = Input::only('email','password');
                // validate the form (the input)
                $this->signInForm->validate($input);
                // if it's invalid , then go back .
                //  -- This part is done automatically in global.php
                // if it is valid, sign the user in
                if (Auth::attempt($input)){
                   // Display a flash message
                   Flash::message('Welcome back!');
                    
                   // redirect to statuses if user is logged in
                   return Redirect::intended('statuses');
                }
                
                
            
	}

	/**
	 * Log a user out of the website
	 * @return mixed
	 */
	public function destroy()
	{
                //Logout using auth object?
		Auth::logout();
                
                // display a message to the user that he logged out
                Flash::message('You have now been logged out from the website!');
                // redirect the user to the main page ?
                return Redirect::home();
	}


}
