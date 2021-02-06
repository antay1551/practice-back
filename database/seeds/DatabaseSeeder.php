<?php

use database\seeds\PermissionSeeder;
use database\seeds\RoleSeeder;
use database\seeds\UserSeeder;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call( PermissionSeeder::class);
        $this->call( RoleSeeder::class);
         $this->call( RoleSeeder::class);
         $this->call(UserSeeder::class);
    }
}
