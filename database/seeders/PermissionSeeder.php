<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("DELETE FROM permissions");
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'key' => 'employee_management',
                'display_name' => 'Employee Management',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'key' => 'employee_onboarding',
                'display_name' => 'Employee Onboarding',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'key' => 'employee_termination',
                'display_name' => 'Employee Termination',
                'module_id' => 1,
            ],
            [
                'id' => 4,
                'key' => 'roles_and_permissions',
                'display_name' => 'Roles and Permissions',
                'module_id' => 2,
            ],


        ]);
    }
}
