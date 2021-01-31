<?php

namespace App\Application\Role\StoreRole;

use Rosamarsky\CommandBus\Command;

/**
 * Class StoreRole
 * @package App\Application\Role\StoreRole
 */
class StoreRole implements Command
{
    /**
     * @var string
     */
    private $name;

    /**
     * StoreRole constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
