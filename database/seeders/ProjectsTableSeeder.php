<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  

        
        DB::table('projects')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10).'@example.com',
            'status' => Hash::make('password'),
        ]);
    }
}
