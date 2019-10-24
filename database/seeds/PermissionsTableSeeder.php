<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'hospital_create',
            ],
            [
                'id'    => '18',
                'title' => 'hospital_edit',
            ],
            [
                'id'    => '19',
                'title' => 'hospital_show',
            ],
            [
                'id'    => '20',
                'title' => 'hospital_delete',
            ],
            [
                'id'    => '21',
                'title' => 'hospital_access',
            ],
            [
                'id'    => '22',
                'title' => 'branch_create',
            ],
            [
                'id'    => '23',
                'title' => 'branch_edit',
            ],
            [
                'id'    => '24',
                'title' => 'branch_show',
            ],
            [
                'id'    => '25',
                'title' => 'branch_delete',
            ],
            [
                'id'    => '26',
                'title' => 'branch_access',
            ],
            [
                'id'    => '27',
                'title' => 'service_create',
            ],
            [
                'id'    => '28',
                'title' => 'service_edit',
            ],
            [
                'id'    => '29',
                'title' => 'service_show',
            ],
            [
                'id'    => '30',
                'title' => 'service_delete',
            ],
            [
                'id'    => '31',
                'title' => 'service_access',
            ],
            [
                'id'    => '32',
                'title' => 'doctor_create',
            ],
            [
                'id'    => '33',
                'title' => 'doctor_edit',
            ],
            [
                'id'    => '34',
                'title' => 'doctor_show',
            ],
            [
                'id'    => '35',
                'title' => 'doctor_delete',
            ],
            [
                'id'    => '36',
                'title' => 'doctor_access',
            ],
            [
                'id'    => '37',
                'title' => 'appointment_create',
            ],
            [
                'id'    => '38',
                'title' => 'appointment_edit',
            ],
            [
                'id'    => '39',
                'title' => 'appointment_show',
            ],
            [
                'id'    => '40',
                'title' => 'appointment_delete',
            ],
            [
                'id'    => '41',
                'title' => 'appointment_access',
            ],
            [
                'id'    => '42',
                'title' => 'profile_access',
            ],
            [
                'id'    => '43',
                'title' => 'healthcare_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
