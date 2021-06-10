<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param string|null $email
     * @param string|null $password
     * @return string
     */
    public function loginAsUser(?string $email = 'ivanov@test.com', ?string $password = 'password') {
        $responseLogin = $this->json('post', route('auth.login'), [
            'email' => $email,
            'password' => $password
        ]);

        return $responseLogin['jwt'];
    }
}
