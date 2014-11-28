<?php

namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Description of PublishStatusCommandHandler
 *
 * @author pbc
 */
class PublishStatusCommandHandler implements CommandHandler {
    
    use DispatchableTrait;
/**
 *
 * @var StatusRepository
 */
    protected $statusRepository;
/**
 * 
 * @param \Larabook\Statuses\StatusRepository $statusRepository
 */
    function __construct(StatusRepository $statusRepository) {
        $this->statusRepository = $statusRepository;
    }

    public function handle($command) {

        $status = Status::publish($command->body);
        
        $this->statusRepository->save($status, $command->userId);
        
        $this->dispatchEventsFor($status);
        
        return $status;
        
    }

}
