<?php

namespace App\Application\User\UpdateUser;

use Rosamarsky\CommandBus\Command;

/**
 * Class UpdateUser
 * @package App\Application\User\UpdateUser
 */
class UpdateUser implements Command
{
    /**
     * @var string|null
     */
    private $email;
    /**
     * @var int
     */
    private $id;
    /**
     * @var string|null
     */
    private $firstName;
    /**
     * @var string|null
     */
    private $lastName;

    /**
     * UpdateUser constructor.
     * @param int $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $email
     */
    public function __construct(
        int $id,
        $firstName,
        $lastName,
        $email
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function firstName()
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function lastName()
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }
}
