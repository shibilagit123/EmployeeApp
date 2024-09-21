<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
         $department = ['Marketing', 'Sales', 'Developing', 'Designing', 'Testing', 'Manufacture', 'Production','Administration'];

        foreach ($department as $dep) {
            Department::create(['name' => $dep]);
        }

        DB::table('designations')->insert([
            [
                'department_id' => '1',
                'name' => 'Marketing Staff',
                'status' => '1',
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ],
        [
                'department_id' => '1',
                'name' => 'Marketing head',
                'status' => '1',
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ],
        [
                'department_id' => '2',
                'name' => 'Sales Head',
                'status' => '1',
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ],
        [
                'department_id' => '3',
                'name' => 'Software Developer',
                'status' => '1',
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ],
        [
                'department_id' => '3',
                'name' => 'Web Developer',
                'status' => '1',
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ],
        [
                'department_id' => '7',
                'designation_id' => 'Production Engineer',
                'status' => '1',
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ],
        [
                'department_id' => '5',
                'designation_id' => 'Qc Tester',
                'status' => '1',
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ],
        ]);

        

    }
}
