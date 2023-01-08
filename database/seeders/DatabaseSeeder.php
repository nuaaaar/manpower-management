<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserPermission;
use Faker\Factory as Faker;
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
        $faker = Faker::create('id_ID');

        Role::create([
            'name' => 'Command Center'
        ]);

        Role::create([
            'name' => 'Operasional Lapangan'
        ]);

        $commandcenterNames = [
            'Admin Command Center',
            'Enggelina Monika Sauyai',
            'Hendry Irnawan Saputro'
        ];

        $commandcenterPermissions = [];

        foreach ($commandcenterNames as $key => $commandcenterName) {
            $user = User::create([
                'role_id' => 1,
                'name' => $commandcenterName,
                'username' => strtolower(explode(' ', $commandcenterName)[0]),
                'email' => strtolower(explode(' ', $commandcenterName)[0]) . '@ccpapuabarat.com',
                'phone_number' => '0851524' . $key . '33' . $key . '1',
                'password' => bcrypt(strtolower(explode(' ', $commandcenterName)[0]) . '98765'),
                'status' => 'aktif'
            ]);
            $tempCommandcenterPermissions = [
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_fulldata',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_read',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_create',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_update',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_delete',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'upt_read',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'upt_create',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'upt_update',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'upt_delete',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_read',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_create',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_update',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_delete',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_location_read',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'search_read',
                ]
            ];
            foreach ($tempCommandcenterPermissions as $key => $commandcenterPermission)
            {
                array_push($commandcenterPermissions, $commandcenterPermission);
            }
        }

        UserPermission::insert($commandcenterPermissions);

        $operatorNames = [
            'Ely Semuel Leihitu',
            'Jeffry Cornelis Angkotta',
            'Mohammad Hasanusi',
            'Frankly Lahumeten',
            'Festiani Tirsa Saidui',
            'Leonora Puadi'
        ];

        $operatorPermissions = [];

        foreach ($operatorNames as $key => $operatorName) {
            $user = User::create([
                'role_id' => 2,
                'name' => $operatorName,
                'username' => strtolower(explode(' ', $operatorName)[0]),
                'email' => strtolower(explode(' ', $operatorName)[0]) . '@ccpapuabarat.com',
                'phone_number' => '0851524' . $key . '11' . $key . '2',
                'password' => bcrypt(strtolower(explode(' ', $operatorName)[0]) . '98765'),
                'status' => 'aktif'
            ]);
            $tempOperatorPermissions = [
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_read',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_create',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_update',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_activity_delete',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'upt_read',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'user_location_read',
                ],
                [
                    'user_id' => $user->id,
                    'permission' => 'search_read',
                ]
            ];
            foreach ($tempOperatorPermissions as $key => $operatorPermission)
            {
                array_push($operatorPermissions, $operatorPermission);
            }
        }

        UserPermission::insert($operatorPermissions);


        // \App\Models\User::factory(10)->create();
    }
}
