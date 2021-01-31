<?php

namespace App\Application\User\DestroyUser;

use App\Model\User\User;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class DestroyUserHandler
 * @package App\Application\User\DestroyUser
 */
class DestroyUserHandler implements Handler
{
    /**
     * @param Command|DestroyUser $command
     */
    public function handle(Command $command)
    {
        User::destroy($command->id());
    }
}
