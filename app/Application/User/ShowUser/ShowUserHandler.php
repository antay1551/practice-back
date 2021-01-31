<?php

namespace App\Application\User\ShowUser;

use App\Model\User\User;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class ShowUserHandler
 * @package App\Application\User\ShowUser
 */
class ShowUserHandler implements Handler
{
    /**
     * @param Command|ShowUser $command
     * @return User
     */
    public function handle(Command $command)
    {
        return User::find($command->id());
    }
}
