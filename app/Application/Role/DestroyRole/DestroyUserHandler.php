<?php

namespace App\Application\Role\DestroyRole;

use App\Model\Role\Role;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class DestroyUserHandler
 * @package App\Application\Role\DestroyRole
 */
class DestroyUserHandler implements Handler
{
    /**
     * @param Command|DestroyRole $command
     */
    public function handle(Command $command)
    {
        Role::destroy($command->id());
    }
}
