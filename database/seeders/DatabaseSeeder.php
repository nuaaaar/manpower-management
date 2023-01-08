<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Command Center'
        ]);

        Role::create([
            'name' => 'Operasional Lapangan'
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Admin Command Center',
            'email' => 'admin@ccpapuabarat.com',
            'phone_number' => '0812345678910',
            'password' => bcrypt('password')
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Petugas Operasional',
            'email' => 'petugas@ccpapuabarat.com',
            'phone_number' => '081231231230',
            'password' => bcrypt('password')
        ]);


        UserPermission::insert([
            [
                'user_id' => 1,
                'permission' => 'user_activity_fulldata',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_activity_read',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_activity_create',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_activity_update',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_activity_delete',
            ],
            [
                'user_id' => 1,
                'permission' => 'upt_read',
            ],
            [
                'user_id' => 1,
                'permission' => 'upt_create',
            ],
            [
                'user_id' => 1,
                'permission' => 'upt_update',
            ],
            [
                'user_id' => 1,
                'permission' => 'upt_delete',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_read',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_create',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_update',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_delete',
            ],
            [
                'user_id' => 1,
                'permission' => 'user_location_read',
            ],
            [
                'user_id' => 1,
                'permission' => 'search_read',
            ],
            [
                'user_id' => 2,
                'permission' => 'user_activity_fulldata',
            ],
            [
                'user_id' => 2,
                'permission' => 'user_activity_read',
            ],
            [
                'user_id' => 2,
                'permission' => 'user_activity_create',
            ],
            [
                'user_id' => 2,
                'permission' => 'user_activity_update',
            ],
            [
                'user_id' => 2,
                'permission' => 'user_activity_delete',
            ],
            [
                'user_id' => 2,
                'permission' => 'user_location_read',
            ],
            [
                'user_id' => 2,
                'permission' => 'search_read',
            ],
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
