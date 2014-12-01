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
    public function create() {
        // We should not be able to see a login page if the user is allready logged in


        return View::make('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $input = Input::only('email', 'password');

        $this->signInForm->validate($input);


        if (!Auth::attempt($input)) {

            Flash::message('We were unable to sign you in. Please check your credentials and try again!');

            return Redirect::back()->withInput();
        } else {

            Flash::message('Welcome back!');
            return Redirect::intended('statuses');
        }
    }

    /**
     * Log a user out of the website
     * @return mixed
     */
    public function destroy() {
        //Logout using auth object?
        Auth::logout();

        // display a message to the user that he logged out
        Flash::message('You have now been logged out from the website!');
        // redirect the user to the main page ?
        return Redirect::home();
    }

}
