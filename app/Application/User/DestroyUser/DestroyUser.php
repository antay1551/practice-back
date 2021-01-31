<?php

namespace App\Application\User\DestroyUser;

use Rosamarsky\CommandBus\Command;

/**
 * Class DestroyUser
 * @package App\Application\User\DestroyUser
 */
class DestroyUser implements Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * DestroyUser constructor.
     * @param int $id
     */
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
