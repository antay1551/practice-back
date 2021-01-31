<?php

namespace App\Http\Controllers\Api;

use App\Application\User\UserRegister\UserRegister;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Model\User\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends ApiController
{
    /**
     * @param UserRegisterRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function register(UserRegisterRequest $request)
    {
        $user = $this->dispatch(new UserRegister(
            $request->get('firstName'),
            $request->get('lastName'),
            $request->get('email'),
            $request->get('password')
        ));

        return response(
            new UserResource($user),
            Response::HTTP_CREATED
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function login(Request $request)
    {
        if (!(Auth::attempt($request->only('email', 'password')))) {
            return response([
                'error' => 'Invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        /** @var User $user */
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60*24);

        return response([
            'jwt' => $token
        ])->withCookie($cookie);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function user(Request $request)
    {
        return $request->user();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }
}
