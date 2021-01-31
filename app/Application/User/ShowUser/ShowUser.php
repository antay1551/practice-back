<?php

namespace App\Application\User\ShowUser;

use Rosamarsky\CommandBus\Command;

/**
 * Class ShowUser
 * @package App\Application\User\StoreUser
 */
class ShowUser implements Command
{
    /**
     * @var int
     */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }
}
