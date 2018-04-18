<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Category::class, 3)->create()->each(function($cate){
           $cate->brands()->save(factory(App\Models\Brand::class)->make())->each(function($b){
               $b->products()->save(factory(App\Models\Product::class)->make());
           });
        });
    }
}
