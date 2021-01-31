<?php

namespace App\Http\Controllers\Api;

use App\Application\User\AllUser\AllUser;
use App\Application\User\DestroyUser\DestroyUser;
use App\Application\User\ShowUser\ShowUser;
use App\Application\User\StoreUser\StoreUser;
use App\Application\User\UpdateUser\UpdateUser;
use App\Http\Requests\User\StoreUserRequest;
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
            new UserResource($users),
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
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $user = $this->dispatch(new ShowUser($id));

        return response()->json(
            new UserResource($user),
            Response::HTTP_OK
        );
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
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
    public function destroy($id)
    {
        $this->dispatch(new DestroyUser($id));

        return response()->json(
            new UserDestroyResource(new Request()),
            Response::HTTP_NO_CONTENT
        );
    }
}
