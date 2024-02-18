<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            'html',
            'js',
            'css',
            'sass',
            'php',
            'vite',
            'laravel',
        ];

        foreach ($technologies as $name) {
            $newTech = new Technology();
            $newTech->technology = $name;
            $newTech->color = $faker->safeHexColor();
            $newTech->save();
        }
    }
}