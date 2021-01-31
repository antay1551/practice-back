<?php

namespace App\Application\User\AllUser;

use App\Model\User\User;
use Illuminate\Database\Eloquent\Collection;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class AllUserHandler
 * @package App\Application\User\AllUser
 */
class AllUserHandler implements Handler
{
    /**
     * @param Command|AllUser $command
     * @return User[]|Collection|mixed
     */
    public function handle(Command $command)
    {
        return User::all();
    }
}
