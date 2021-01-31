<?php

namespace App\Application\Permission\AllPermission;

use App\Model\Permission\Permission;
use App\Model\User\User;
use Illuminate\Database\Eloquent\Collection;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class AllPermissionHandler
 * @package App\Application\User\AllPermission
 */
class AllPermissionHandler implements Handler
{
    /**
     * @param Command|AllPermission $command
     * @return User[]|Collection|mixed
     */
    public function handle(Command $command)
    {
        return Permission::paginate();
    }
}
