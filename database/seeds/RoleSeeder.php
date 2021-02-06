<?php

namespace database\seeds;

use App\Model\Permission\Permission;
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
        $admin = Role::create([
            'name' => 'Admin',
        ]);

        $editor = Role::create([
            'name' => 'Editor',
        ]);

        $viewer = Role::create([
            'name' => 'Viewer',
        ]);

        $permission = Permission::all();

        $admin->permissions()->attach($permission->pluck('id'));

        $editor->permissions()->attach($permission->pluck('id'));
        $editor->permissions()->detach(4);

        $viewer->permissions()->attach([1, 3, 5, 7]);
    }
}
