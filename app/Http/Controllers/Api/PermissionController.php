<?php

namespace App\Http\Controllers\Api;

use App\Application\Permission\AllPermission\AllPermission;
use App\Http\Resources\Permission\PermissionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Api
 */
class PermissionController extends ApiController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $permissions = $this->dispatch(new AllPermission());

        return response()->json(
            PermissionResource::collection($permissions),
            Response::HTTP_OK
        );
    }
}
