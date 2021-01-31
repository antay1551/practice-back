<?php

namespace App\Http\Controllers\Api;

use App\Application\Role\AllRole\AllRole;
use App\Application\Role\DestroyRole\DestroyRole;
use App\Application\Role\ShowRole\ShowRole;
use App\Application\Role\StoreRole\StoreRole;
use App\Application\Role\UpdateRole\UpdateRole;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Illuminate\Http\Response;

/**
 * Class RoleController
 * @package App\Http\Controllers\Api
 */
class RoleController extends ApiController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $roles = $this->dispatch(new AllRole());

        return $roles;
//        return response($user, Response::HTTP_OK);
    }

    /**
     * @param StoreRoleRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = $this->dispatch(new StoreRole($request->get('name')));

        return response($role, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $role = $this->dispatch(new ShowRole($id));

        return $role;
    }

    /**
     * @param UpdateRoleRequest $request
     * @param int $id
     * @return mixed
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $user = $this->dispatch(new UpdateRole(
            $id,
            $request->get('name')
        ));

        return $user;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DestroyRole($id));

        return response([], Response::HTTP_NO_CONTENT);
    }
}
