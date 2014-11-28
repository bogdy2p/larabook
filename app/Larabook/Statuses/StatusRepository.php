<?php

namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository {

    public function getAllForUser(User $user) {
        return $user->statuses()->get();
    }

    /**
     * Save a new status for a user !
     * @param Status $status
     * @param type $userId
     * @return type
     */
    public function save(Status $status, $userId) {

        return User::findOrFail($userId)
                        ->statuses()
                        ->save($status);
    }

}
