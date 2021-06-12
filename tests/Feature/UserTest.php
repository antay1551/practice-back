<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class UserTest
 * @package Tests\Feature
 */
class UserTest extends TestCase
{
    /**
     * @test
     */
    public function shouldTestShowUser()
    {
        $this->loginAsUser();

        $this->json('GET', route('auth.users.index', ['id' => 1]))
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                [
                    'type' => 'user',
                    'id' => 1,
                    'attributes' => [
                        'firstName' => 'Ivan',
                        'lastName' => 'Ivanov',
                        'email' => 'ivanov@test.com',
                    ],
                ]
            ]);
    }

    /**
     * @test
     */
    public function shouldTestPostUser()
    {
        $token = $this->loginAsUser();

        $this->json('POST', route('auth.users.store'), [
                'firstName' => 'Bred',
                'lastName' => 'Pitt',
                'email' => 'test@test.com',
                'password' => '123456789',
                'passwordConfirm' => '123456789',
            ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJson([
                [
                    'type' => 'user',
                    'id' => 1,
                    'attributes' => [
                        'firstName' => 'Ivan',
                        'lastName' => 'Ivanov',
                        'email' => 'ivanov@test.com',
                    ],
                ]
            ]);
    }

    /**
     * @test
     */
    public function shouldTestUpdateUser()
    {
        $token = $this->loginAsUser();

        $this->assertDatabaseHas('users', [
            'id' => 1,
            'first_name' => 'Ivan',
            'last_name' => 'Ivanov',
            'email' => 'ivanov@test.com'
        ]);

        $this->json('PUT', route('auth.users.update', ['id' => 1]), [
                'firstName' => 'TestName',
                'lastName' => 'TestLastName',
                'email' => 'test@test.com'
            ], [
            'Authorization' => $token
            ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                [
                    'type' => 'user',
                    'id' => 1,
                    'attributes' => [
                        'firstName' => 'TestName',
                        'lastName' => 'TestLastName',
                        'email' => 'test@test.com',
                    ],
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'id' => 1,
            'first_name' => 'TestName',
            'last_name' => 'TestLastName',
            'email' => 'test@test.com'
        ]);
    }
}
