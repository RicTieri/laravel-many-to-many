<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typeIds = Type::all()->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            $project = new Project();
            $project->type_id = $faker->randomElement($typeIds);
            $project->title = $faker->unique()->name();
            $project->author = $faker->unique()->name();
            $project->project_image = $faker->imageUrl();
            $project->content = $faker->text();
            $project->date = $faker->date();
            $project->save();
        }
    }
}
