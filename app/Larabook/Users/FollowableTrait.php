<?php

namespace Larabook\Users;

/**
 * Description of FollowableTrait
 *
 * @author pbc
 */
trait FollowableTrait {

    /**
     * Get the list of users that the current user follows.
     * @return type
     */
    public function followedUsers() {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')
                        ->withTimestamps();
    }

    /**
     * Determine if current user follows another user
     * @param \Larabook\Users\User $otherUser
     * @return type
     */
    public function isFollowedBy(User $otherUser) {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

    /**
     * Get the list of users who follow the current user.
     * @return type
     */
    public function followers() {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')
                        ->withTimestamps();
    }

}
