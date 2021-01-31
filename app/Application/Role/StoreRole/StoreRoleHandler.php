<?php

namespace App\Application\Role\StoreRole;

use App\Model\Role\Role;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class StoreRoleHandler
 * @package App\Application\Role\StoreRole
 */
class StoreRoleHandler implements Handler
{
    /**
     * @param Command|StoreRole $command
     * @return Role
     */
    public function handle(Command $command)
    {
        $role = Role::create([
            'name' => $command->name(),
        ]);

        return $role;
    }
}
