<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

    /**
     * Follow a user 
     *
     * @return Response
     */
    public function store() {
        //In order to follow a user
        //we need the id of the user to follow
        //we need the id of the authenticated user too.
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');

        return Redirect::back();
    }

    /**
     * Unfollow a user.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($userIdToUnfollow) {

        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(UnfollowUserCommand::class, $input);

        Flash::success('You have now unfollowed this user.');

        return Redirect::back();
    }

}
