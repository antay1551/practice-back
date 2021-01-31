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
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function handle(Command $command)
    {
        return User::with('role')->find($command->id());
    }
}
