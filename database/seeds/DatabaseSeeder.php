<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $tables =
        [
            'customers',
            'payment_methods',
            'ship_statuses',
            'news',
            'promotions',
            'categories',
            'brands',
            'products',
            'companies'

        ];

    protected $seeders =
        [
            CustomerSeeder::class,
            PaymentMethodSeeder::class,
            ShipStatusSeeder::class,
            NewsSeeder::class,
            PromotionSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class

        ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        if (\DB::connection()->getName() === 'mysql') {
            $this->truncateDatabase();
        }
        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }
        Model::reguard();
    }

    private function truncateDatabase()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach ($this->tables as $table) {
            \DB::table($table)->truncate();
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
