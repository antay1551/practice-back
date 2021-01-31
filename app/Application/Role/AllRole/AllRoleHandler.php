<?php

namespace App\Application\Role\AllRole;

use App\Model\Role\Role;
use App\Model\User\User;
use Illuminate\Database\Eloquent\Collection;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class AllRoleHandler
 * @package App\Application\Role\AllRole
 */
class AllRoleHandler implements Handler
{
    /**
     * @param Command|AllRole $command
     * @return User[]|Collection|mixed
     */
    public function handle(Command $command)
    {
        return Role::paginate();
    }
}
