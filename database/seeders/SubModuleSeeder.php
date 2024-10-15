<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("DELETE FROM sub_modules");
        DB::table('sub_modules')->insert([
            [
                'id' => 1,
                'name' => 'Employee Onboarding',
                'key' => 'employee_onboarding_index',
                'position' => 1,
                'route' => 'employee_management.employee_onboarding.index',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Employee Termination',
                'key' => 'employee_termination_index',
                'position' => 2,
                'route' => 'employee_management.employee_termination.index',
                'module_id' => 1,
            ],
        ]);
    }
}
