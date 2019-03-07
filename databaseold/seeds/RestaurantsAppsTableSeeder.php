<?php

use Illuminate\Database\Seeder;
use Modules\ManagmentModule\Entities\RestaurantApp;

class RestaurantsAppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantApp = [
            'app_id' => 1,
            'restaurant_id' => 1,
        ];

        RestaurantApp::create($restaurantApp);
    }
}
