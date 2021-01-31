<?php

namespace App\Application\Role\UpdateRole;

use Rosamarsky\CommandBus\Command;

/**
 * Class UpdateRole
 * @package App\Application\Role\UpdateRole
 */
class UpdateRole implements Command
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $id;

    /**
     * UpdateRole constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(
        int $id,
        string $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }
}
