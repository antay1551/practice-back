<?php

namespace App\Application\Role\ShowRole;

use App\Model\Role\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
     * @return Builder|Builder[]|Collection|Model|mixed|null
     */
    public function handle(Command $command)
    {
        return Role::with('permissions')->find($command->id());
    }
}
