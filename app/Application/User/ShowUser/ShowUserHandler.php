<?php

namespace App\Application\User\ShowUser;

use App\Model\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
     * @return Builder|Builder[]|Collection|Model|mixed|null
     */
    public function handle(Command $command)
    {
        return User::with('role')->find($command->id());
    }
}
