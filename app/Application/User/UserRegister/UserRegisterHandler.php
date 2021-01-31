<?php

namespace App\Application\User\UserRegister;

use App\Model\User\User;
use Illuminate\Support\Facades\Hash;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class UserRegisterHandler
 * @package App\Application\User\UserRegister
 */
class UserRegisterHandler implements Handler
{
    /**
     * @param Command|UserRegister $command
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
