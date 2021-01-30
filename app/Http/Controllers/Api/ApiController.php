<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Rosamarsky\CommandBus\Command;
use Rosamarsky\CommandBus\CommandBus;

/**
 * Class ApiController
 * @package App\Http\Controllers\Api
 */
class ApiController extends Controller
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function dispatch(Command $command)
    {
        return $this->commandBus->execute($command);
    }
}
