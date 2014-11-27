<?php

namespace Larabook\Registration;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;
use Larabook\Users\User;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Description of RegisterUserCommandHandler
 *
 * @author pbc
 */
class RegisterUserCommandHandler implements CommandHandler {

    use DispatchableTrait;
    
    /**
     * @var UserRepository
     */
    
    protected $repository;

    /**
     * 
     * @param UserRepository $repository
     */
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
        
        $this->dispatchEventsFor($user);
        
        //Return user object.
        return $user;
    }

}
