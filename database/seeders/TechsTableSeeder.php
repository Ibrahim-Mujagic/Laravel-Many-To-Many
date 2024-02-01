<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Techs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = ['Html','Css','Javascript','Vue','Php','Laravel'];

        foreach($data as $item){
            $newTechnology = new Techs();
            $newTechnology->name = $item;
            $newTechnology->slug =  Project::generateSlug($newTechnology->name);
            $newTechnology->save();
        }
    }
}
