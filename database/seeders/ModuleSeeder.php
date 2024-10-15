<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("DELETE FROM modules");
        DB::table('modules')->insert([
            [
                'id' => 1,
                'name' => 'Employee Management',
                'key' => 'employee_management',
                'icon' => 'fas fa-archive',
                'position' => 1,
                'route' => null
            ],
            [
                'id' => 2,
                'name' => 'Roles and Permissions',
                'key' => 'roles_and_permissions',
                'icon' => 'fas fa-archive',
                'position' => 2,
                'route' => 'role_permission.index'
            ]
        ]);
    }
}
