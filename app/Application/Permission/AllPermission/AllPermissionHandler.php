<?php

namespace App\Application\Permission\AllPermission;

use App\Model\Permission\Permission;
use App\Model\User\User;
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
     * @return User[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function handle(Command $command)
    {
        return Permission::paginate();
    }
}
