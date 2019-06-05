<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-06-05 06:57:39',
            'updated_at' => '2019-06-05 06:57:39',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '17',
                'title'      => 'region_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '18',
                'title'      => 'region_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '19',
                'title'      => 'region_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '20',
                'title'      => 'region_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '21',
                'title'      => 'building_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '22',
                'title'      => 'building_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '23',
                'title'      => 'building_show',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '24',
                'title'      => 'building_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '25',
                'title'      => 'building_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '26',
                'title'      => 'metro_station_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '27',
                'title'      => 'metro_station_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '28',
                'title'      => 'metro_station_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '29',
                'title'      => 'metro_station_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '30',
                'title'      => 'floor_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '31',
                'title'      => 'floor_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '32',
                'title'      => 'floor_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '33',
                'title'      => 'floor_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '34',
                'title'      => 'address_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '35',
                'title'      => 'realty_object_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '36',
                'title'      => 'realty_object_create',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '37',
                'title'      => 'realty_object_edit',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '38',
                'title'      => 'realty_object_show',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '39',
                'title'      => 'realty_object_delete',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '40',
                'title'      => 'realty_object_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '41',
                'title'      => 'audit_log_show',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ],
            [
                'id'         => '42',
                'title'      => 'audit_log_access',
                'created_at' => '2019-06-05 06:57:39',
                'updated_at' => '2019-06-05 06:57:39',
            ]];

        Permission::insert($permissions);
    }
}
