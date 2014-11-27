<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;

class RegistrationController extends \BaseController {
    /*
     * @var CommandBus
     */

    private $commandBus;

    /*
     * @var RegistrationForm
     */
    private $registrationForm;

    /*
     * Constructor
     * 
     * @param RegistrationForm $registrationForm
     */

    function __construct(\Laracasts\Commander\CommandBus $commandBus, RegistrationForm $registrationForm) {
        $this->commandBus = $commandBus;
        $this->registrationForm = $registrationForm;
    }

    /**
     * Show the form to register a user
     *
     * @return Response
     */
    public function create() {
        return View::make('registration.create');
    }

    /*
     * Create a new Larabook User account
     * 
     * @return string
     */

    public function store() {
        //Validate the form before doing anything.
        $this->registrationForm->validate(Input::all());
        //Grab the necessary input if nothing goes wrong @ form validation
        extract(Input::only('username', 'email', 'password'));
        //Reference the command of registering a user
        $command = new RegisterUserCommand($username, $email, $password);
        //Throw that command into the commandbus! (Make sure that the command bus returns our user.
        $user = $this->commandBus->execute($command);


        Auth::login($user);


        return Redirect::home();
    }

}
