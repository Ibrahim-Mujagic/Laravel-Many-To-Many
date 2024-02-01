<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Techs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTechsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 200; $i++){
            $project = Project::inRandomOrder()->first();
            $tech_id = Techs::inRandomOrder()->first()->id;
            $project->techs()->attach($tech_id);
        }
    }
    
}
