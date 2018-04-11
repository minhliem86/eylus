<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ShipStatusSeeder extends Seeder
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
                'code' => '1',
                'description' => 'Lưu Kho',
            ],
            [
                'code' => '2',
                'description' => 'Trên Đường Vận Chuyển',
            ],
            [
                'code' => '3',
                'description' => 'Giao Hàng Thành Công',
            ]

        ];
        \DB::table('ship_statuses')->insert($data);
    }
}
