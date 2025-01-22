<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolesAndPermissionSeeder::class
        ]);
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@hit.ac.zw',
        ]);
        $user=User::find(1);
        $user->assignRole('SuperAdmin');

    }
}
