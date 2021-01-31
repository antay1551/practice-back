<?php

namespace App\Application\Role\UpdateRole;

use App\Model\Role\Role;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class UpdateRoleHandler
 * @package App\Application\Role\UpdateRole
 */
class UpdateRoleHandler implements Handler
{
    /**
     * @param Command|UpdateRole $command
     * @return Role
     */
    public function handle(Command $command)
    {
        $role = Role::find($command->id());
        $role->name = $command->name();
        $role->save();

        return $role;
    }
}
