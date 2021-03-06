<?php

namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Larabook\Registration\Events\UserRegistered;
use Eloquent,
    Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait,
        EventGenerator,
        PresentableTrait,
        FollowableTrait;

    /*
     * Which fields can be mass assigned 
     */

    protected $fillable = ['username', 'email', 'password'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $presenter = 'Larabook\Users\UserPresenter';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Password hashing here.  
     * @param type $password
     */
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * A user has many statuses.
     * 
     * @return type
     */
    public function statuses() {
        return $this->hasMany('Larabook\Statuses\Status');
    }

    /**
     * Register a new user
     * The custom user register function
     * Accepts the username , the email and password
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static 
     */
    public static function register($username, $email, $password) {
        $user = new static(compact('username', 'email', 'password'));

        // raise an event (Alert the other functionalities that a new user has been created.
        $user->raise(new UserRegistered($user));



        return $user;
    }

    /**
     * Determine if the given user is the same
     * as the current one.
     * @param $user
     * @return type boolean
     */
    public function is($user) {

        if (is_null($user))
            return false;

        return $this->username == $user->username;
    }

}
