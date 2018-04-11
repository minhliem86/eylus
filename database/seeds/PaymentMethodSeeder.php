<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = [
            [
                'name_vi' => 'COD',
                'name_en' => 'COD',
                'order' => 1,
                'status' => 1
            ],
            [
                'name_vi' => 'Ngân Lượng',
                'name_en' => 'Ngân Lượng',
                'order' => 2,
                'status' => 1
            ]

        ];
        \DB::table('payment_methods')->insert($data);
    }
}
