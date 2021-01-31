<?php

namespace App\Http\Controllers\Api;

use App\Application\Permission\AllPermission\AllPermission;
use Illuminate\Http\Request;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Api
 */
class PermissionController extends ApiController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $permissions = $this->dispatch(new AllPermission());

        return $permissions;
    }
}
