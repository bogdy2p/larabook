<?php

namespace Larabook\Registration;

/**
 * Description of RegisterUserCommand
 *
 * @author pbc
 */
class RegisterUserCommand {

    //put your code here

    public $username;
    public $email;
    public $password;

    function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

}
