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

    //put your code here
}
