<?php

namespace App\Application\Role\DestroyRole;

use Rosamarsky\CommandBus\Command;

/**
 * Class DestroyRole
 * @package App\Application\Role\DestroyRole
 */
class DestroyRole implements Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * DestroyRole constructor.
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
