<?php

namespace App\Http\Controllers\Api;

use App\Application\User\AllUser\AllUser;
use App\Application\User\DestroyUser\DestroyUser;
use App\Application\User\ShowUser\ShowUser;
use App\Application\User\StoreUser\StoreUser;
use App\Application\User\UpdateUser\UpdateUser;
use App\Http\Requests\User\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class UserController extends ApiController
{
    /**
     * @return Response
     */
    public function index()
    {
        $users = $this->dispatch(new AllUser());
        return $users;
//        return response($user, Response::HTTP_OK);
    }

    /**
     * @param StoreUserRequest $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->dispatch(new StoreUser(
            $request->get('firstName'),
            $request->get('lastName'),
            $request->get('email'),
            $request->get('password')
        ));

        return response($user, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->dispatch(new ShowUser($id));

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->dispatch(new UpdateUser(
            $id,
            $request->get('firstName'),
            $request->get('lastName'),
            $request->get('email')
        ));

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DestroyUser($id));

        return response([], Response::HTTP_NO_CONTENT);
    }
}
