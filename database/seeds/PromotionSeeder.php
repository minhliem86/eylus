<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Promotion::class,10)->create();
    }
}
