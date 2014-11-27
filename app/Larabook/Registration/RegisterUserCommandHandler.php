<?php namespace Larabook\Registration;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;
use Larabook\Users\User;

/**
 * Description of RegisterUserCommandHandler
 *
 * @author pbc
 */
class RegisterUserCommandHandler implements CommandHandler {
    
    protected $repository;
    
    function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }
    
    /*
     * Handle the command
     * 
     * @param $command
     * @return mixed
     */

    public function handle($command) {

        //Register user.
        $user = User::register(
                        $command->username, $command->email, $command->password
        );
        //Persist user.
        $this->repository->save($user);
        //Return user object.
        return $user;
    }

}
