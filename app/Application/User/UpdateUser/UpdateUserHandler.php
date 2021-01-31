<?php

namespace App\Application\User\UpdateUser;

use App\Model\User\User;
use Illuminate\Support\Facades\Hash;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\Handler;

/**
 * Class UpdateUserHandler
 * @package App\Application\User\UpdateUser
 */
class UpdateUserHandler implements Handler
{
    /**
     * @param Command|UpdateUser $command
     * @return User
     */
    public function handle(Command $command)
    {
        $user = User::find($command->id());

        if ($command->email()) {
            $user->email = $command->email();
        }

        if ($command->firstName()) {
            $user->first_name = $command->firstName();
        }

        if ($command->lastName()) {
            $user->last_name = $command->lastName();
        }

        $user->save();

        return $user;
    }
}
