<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'SuperAdmin']);
        Permission::create(['name'=>'Product.Create']);
        Permission::create(['name'=>'Product.Approve']);
        $role=Role::create([
            'name'=>'SuperAdmin'
        ]);
        $role->givePermissionTo([
            'SuperAdmin','Product.Create','Product.Approve'
        ]);

    }
}
