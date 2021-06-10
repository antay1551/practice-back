<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->loginAsUser();

        $this->json('GET', route('auth.login', ['id' => 1]))
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => [
                    [
                        'type' => 'user',
                        'id' => 1,
                        'attributes' => [
                            'firstName' => '',
                            'lastName' => '',
                            'email' => '',
                        ],
                    ]
                ]
            ]);
    }
}
