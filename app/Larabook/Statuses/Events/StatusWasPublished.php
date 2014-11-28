<?php

namespace Larabook\Statuses\Events;

/**
 * Description of StatusWasPublished
 *
 * @author pbc
 */
class StatusWasPublished {

    public $body;

    function __construct($body) {
        $this->body = $body;
    }

}
