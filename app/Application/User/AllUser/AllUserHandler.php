<?php

namespace App\Application\User\AllUser;

use App\Model\User\User;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

class AllUserHandler implements Handler
{
    /**
     * @param Command|AllUser $command
     * @return User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function handle(Command $command)
    {
        return User::all();
    }
}
