<?php

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = [
            'ar'  => ['name' => 'مصر'],
            'en'  => ['name' => 'Egypt'],
            'is_active' => '1',
        ];
        Country::create($country);
    }
}
