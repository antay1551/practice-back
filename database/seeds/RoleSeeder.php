<?php

namespace database\seeds;

use App\Model\Role\Role;
use Illuminate\Database\Seeder;

/**
 * Class RoleSeeder
 * @package database\seeds
 */
class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'User',
            ]
        ]);
    }
}
