<?php

namespace Larabook\Users;

class UserRepository {

    /**
     * Persist a user
     * 
     * @param \Larabook\Users\User $user
     * @return type
     */
    public function save(User $user) {
        return $user->save();
    }

    /**
     * Get a paginated list of all users.
     * @param type $howMany
     * @return type
     */
    public function getPaginated($howMany = 25) {
        
        return User::simplePaginate($howMany);
        
        
    }
    //put your code here
}
