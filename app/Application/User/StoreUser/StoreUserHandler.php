<?php

namespace App\Application\User\StoreUser;

use App\Http\Requests\User\StoreUserRequest;
use App\Model\User\User;
use Illuminate\Support\Facades\Hash;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class StoreUserHandler
 * @package App\Application\User\StoreUser
 */
class StoreUserHandler implements Handler
{
    /**
     * @param Command|StoreUserRequest $command
     * @return User
     */
    public function handle(Command $command)
    {
        return User::create([
            'first_name' => $command->firstName(),
            'last_name' => $command->lastName(),
            'email' => $command->email(),
            'password' => Hash::make($command->password())
        ]);
    }
}
