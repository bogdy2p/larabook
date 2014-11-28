<?php

namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends \Eloquent {

    use EventGenerator,
        PresentableTrait;

    /**
     * Fillable fields for a new status
     * 
     * @var type 
     */
    protected $fillable = ['body'];
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    /**
     * A status belongs to a user.
     * @return type
     */
    public function user() {

        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * Publish a new status
     * 
     * @param type $body
     * @return \static
     */
    public static function publish($body) {

        $status = new static(compact('body'));
        $status->raise(new StatusWasPublished($body));
        return $status;
    }

}
