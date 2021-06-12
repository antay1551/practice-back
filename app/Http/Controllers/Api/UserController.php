<?php

namespace App\Http\Controllers\Api;

use App\Application\User\AllUser\AllUser;
use App\Application\User\DestroyUser\DestroyUser;
use App\Application\User\ShowUser\ShowUser;
use App\Application\User\StoreUser\StoreUser;
use App\Application\User\UpdateUser\UpdateUser;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserDestroyResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class UserController extends ApiController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->dispatch(new AllUser());

        return response()->json(
            UserResource::collection($users),
            Response::HTTP_OK
        );
    }

    /**
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->dispatch(new StoreUser(
            $request->get('firstName'),
            $request->get('lastName'),
            $request->get('email'),
            $request->get('password')
        ));

        return response()->json(
            new UserResource($user),
            Response::HTTP_CREATED
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $user = $this->dispatch(new ShowUser($id));

        return response()->json(
            new UserResource($user),
            Response::HTTP_OK
        );
    }

    /**
     * @param UpdateUserRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        $user = $this->dispatch(new UpdateUser(
            $id,
            $request->get('firstName'),
            $request->get('lastName'),
            $request->get('email')
        ));

        return response()->json(
            new UserResource($user),
            Response::HTTP_OK
        );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->dispatch(new DestroyUser($id));

        return response()->json(
            new UserDestroyResource(new Request()),
            Response::HTTP_NO_CONTENT
        );
    }
}
