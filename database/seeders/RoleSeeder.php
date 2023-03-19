<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);
        $permission1 = Permission::create(['name' => 'create-user']);
        $permission2 = Permission::create(['name' => 'delete-user']);
        $permission3 = Permission::create(['name' => 'list-user']);
        $permission4 = Permission::create(['name' => 'history']);
        $role1->syncPermissions([$permission1, $permission2, $permission3, $permission4]);
        $role2->givePermissionTo($permission4);
    }
}
