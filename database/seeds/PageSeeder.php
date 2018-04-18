<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [
            [
                'name_vi' => 'Giới thiệu',
                'name_en' => 'About us',
                'slug' => 'gioi-thieu',
                'content_vi' => $faker->paragraph(),
                'content_en' => $faker->paragraph(),
                'type' => 'static',
            ],
            [
                'name_vi' => $faker->words(3, true),
                'name_en' => $faker->words(3, true),
                'slug' => \LP_lib::unicode($faker->words(3, true)),
                'content_vi' => $faker->paragraph(),
                'content_en' => $faker->paragraph(),
                'type' => 'other',
            ],
            [
                'name_vi' => $faker->words(3, true),
                'name_en' => $faker->words(3, true),
                'slug' => \LP_lib::unicode($faker->words(3, true)),
                'content_vi' => $faker->paragraph(),
                'content_en' => $faker->paragraph(),
                'type' => 'other',
            ]

        ];
        foreach($data as $item){
            App\Models\Page::create($item);
        }
    }
}
