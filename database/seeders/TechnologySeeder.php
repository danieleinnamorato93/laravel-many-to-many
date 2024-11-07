<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologyName=[
            "Html",
            "CSS",
            "Vue",
            "Php",
        ];
        foreach($technologyName as $name) {
            $newType= new Technology();
            $newType->name=$name;
            $newType->save();
        }
        
    }
    
}
