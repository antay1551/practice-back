<?php

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
         $this->call( RoleSeeder::class);
         $this->call(UserSeeder::class);
    }
}
