<?php

use Illuminate\Database\Seeder;
use Modules\User\Entities\Permission;
use Modules\User\Entities\Role;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions for an admin

        $adminPermissions = collect(['user_user_create', 'user_user_edit', 'user_user_delete','user_role_create','user_role_edit','user_role_delete'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        // add admin role
        $adminRole = Role::create(['name' => 'admin','guard_name' => 'api']);
        $adminRole->givePermissionTo($adminPermissions);

        // create modules permissions
        $modulesPermissions = collect(['management_branch_create','management_branch_edit','management_branch_delete','menu_menu_create','menu_menu_edit','menu_menu_delete','menu_category_create','menu_category_edit','menu_category_delete'])->map(function($name) {
            return Permission::create(['name' => $name]);
        });
    }
}
