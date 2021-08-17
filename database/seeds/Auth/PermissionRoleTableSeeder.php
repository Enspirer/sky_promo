<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create(['name' => config('access.users.admin_role')]);
        Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        Permission::create(['name' => 'view backend']);
        Permission::create(['name' => 'view email bulk']);
        Permission::create(['name' => 'view campaign']);
        Permission::create(['name' => 'view queue process']);
        Permission::create(['name' => 'view companies']);
        Permission::create(['name' => 'view single mail']);
        Permission::create(['name' => 'view promotion email']);
        Permission::create(['name' => 'view access']);
        Permission::create(['name' => 'view log viewer']);

        // Assign Permissions to other Roles
        // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
        // $user->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
