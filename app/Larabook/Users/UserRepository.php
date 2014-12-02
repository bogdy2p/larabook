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

        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * Get a user by their username
     * @param type $username
     * @return mixed
     */
    public function findByUsername($username) {

        return User::with(['statuses' => function($query) {
                        $query->latest();
                    }])->whereUsername($username)->first();
    }

    /**
     * Find a user by their id
     * @param type $id
     * @return type
     */
    public function findById($id) {

        return User::findOrFail($id);
    }

    /**
     * Follow a larabook User.
     * 
     * @param type $userIdToFollow
     * @param User $user
     * @return type
     */
    public function follow($userIdToFollow, User $user) {
        return $user->followedUsers()->attach($userIdToFollow);
    }

    /**
     * Unfollow a larabook user.
     *
     * @param type $userIdToUnfollow
     * @param \Larabook\Users\User $user
     * @return type
     */
    public function unfollow($userIdToUnfollow, User $user) {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }

}
