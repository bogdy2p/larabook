<?php

namespace Larabook\Core;

use App;


trait CommandBus {

    /**
     * Execute the command
     * 
     * @param type $command
     * @return type mixed
     */
    public function execute($command) {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * Fetch the command bus
     * @return mixed
     */
    public function getCommandBus() {
        return App::make('Laracasts\Commander\CommandBus');
    }

}
