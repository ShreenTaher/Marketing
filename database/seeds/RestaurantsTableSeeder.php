<?php

use Illuminate\Database\Seeder;
use Modules\ManagmentModule\Entities\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant = [
            'ar'  => ['name' => 'مطعم'],
            'en'  => ['name' => 'Restaurant'],
            'image' => 'https://picsum.photos/200/300',
            'phone' => '02030202',
            'city_id' => 1,
            'facebook' => 'https://facebook.com/restaurant',
            'twitter' => 'https://twitter.com/restaurant',
            'instagram' => 'https://instagram.com/restaurant',
            'is_active' => '1',
        ];

        Restaurant::create($restaurant);
    }
}
