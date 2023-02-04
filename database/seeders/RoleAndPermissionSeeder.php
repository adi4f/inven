<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','user')->first();
        $role->givePermissionTo('manage purchasing');
        $role->givePermissionTo('manage selling');
        $role->givePermissionTo('manage invoice');
        $role->givePermissionTo('manage delivery');
        $role->givePermissionTo('manage stock');

        $role = Role::where('name','admin')->first();
        $role->givePermissionTo('manage purchasing');
        $role->givePermissionTo('manage selling');
        $role->givePermissionTo('manage invoice');
        $role->givePermissionTo('manage delivery');
        $role->givePermissionTo('manage stock');
        $role->givePermissionTo('manage accounting');
        $role->givePermissionTo('admin');
    }
}
