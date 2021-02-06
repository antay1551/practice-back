<?php

namespace App\Http\Controllers\Api;

use App\Application\Role\AllRole\AllRole;
use App\Application\Role\DestroyRole\DestroyRole;
use App\Application\Role\ShowRole\ShowRole;
use App\Application\Role\StoreRole\StoreRole;
use App\Application\Role\UpdateRole\UpdateRole;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role\RoleDestroyResource;
use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class RoleController
 * @package App\Http\Controllers\Api
 */
class RoleController extends ApiController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $roles = $this->dispatch(new AllRole());
dd(11);
        return response()->json(
            RoleResource::collection($roles),
            Response::HTTP_OK
        );
    }

    /**
     * @param StoreRoleRequest $request
     * @return JsonResponse
     */
    public function store(StoreRoleRequest $request): JsonResponse
    {
        $role = $this->dispatch(new StoreRole($request->get('name')));

        return response()->json(
            new RoleResource($role),
            Response::HTTP_CREATED
        );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $role = $this->dispatch(new ShowRole($id));

        return response()->json(
            new RoleResource($role),
            Response::HTTP_OK
        );
    }

    /**
     * @param UpdateRoleRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRoleRequest $request, $id): JsonResponse
    {
        $role = $this->dispatch(new UpdateRole(
            $id,
            $request->get('name')
        ));

        return response()->json(
            new RoleResource($role),
            Response::HTTP_OK
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->dispatch(new DestroyRole($id));

        return response()->json(
            new RoleDestroyResource(new Request()),
            Response::HTTP_NO_CONTENT
        );
    }
}
