<?php

namespace database\seeds;

use App\Model\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserSeeder
 * @package database\seeds
 */
class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::insert([
            [
                'first_name' => 'Ivan',
                'last_name' => 'Ivanov',
                'email' => 'ivanov@test.com',
                'password' => Hash::make('password'),
                'role_id' => 1
            ],
            [
                'first_name' => 'Petr',
                'last_name' => 'Petrov',
                'email' => 'petrov@test.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
            ],
            [
                'first_name' => 'Sidr',
                'last_name' => 'Sidorov',
                'email' => 'sidorov@test.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
            ]
        ]);
    }
}
