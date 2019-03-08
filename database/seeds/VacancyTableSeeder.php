<?php

use Illuminate\Database\Seeder;
use App\Vacancy;

class VacancyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<10; $i++) {
            Vacancy::create([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(2),
                'counter' => $faker->numberBetween(0, 1000)
            ]);
        }
    }
}
