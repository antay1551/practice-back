<?php

namespace App\Application\Role\ShowRole;

use App\Model\Role\Role;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class ShowUserHandler
 * @package App\Application\Role\ShowRole
 */
class ShowUserHandler implements Handler
{
    /**
     * @param Command|ShowRole $command
     * @return Role
     */
    public function handle(Command $command)
    {
        return Role::find($command->id());
    }
}
