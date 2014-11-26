<?php

class RegistrationController extends \BaseController {

	/**
	 * Show the form to register a user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

}
