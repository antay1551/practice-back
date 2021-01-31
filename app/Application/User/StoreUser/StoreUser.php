<?php

namespace App\Application\User\StoreUser;

use Rosamarsky\CommandBus\Command;

/**
 * Class StoreUser
 * @package App\Application\User\StoreUser
 */
class StoreUser implements Command
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;

    /**
     * StoreUser constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     */
    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $password
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }
}
