<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = Project::all();
        $technologyIds = Technology::all()->pluck('id');

        foreach ($projects as $project) {
            $project->technologies()->sync($faker->randomElements($technologyIds, rand(1, 7)));
        }
    }
}