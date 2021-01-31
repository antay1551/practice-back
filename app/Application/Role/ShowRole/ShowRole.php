<?php

namespace App\Application\Role\ShowRole;

use Rosamarsky\CommandBus\Command;

/**
 * Class ShowRole
 * @package App\Application\Role\ShowRole
 */
class ShowRole implements Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * ShowRole constructor.
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
