<?php

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = [
            'ar'  => ['name' => 'القاهرة'],
            'en'  => ['name' => 'Cairo'],
            'country_id' => 1,
            'is_active' => 1,
        ];

        City::create($city);
    }
}
