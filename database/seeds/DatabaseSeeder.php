<?php

use App\Database\Seeds\SingleDatabaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
            AppTableSeeder::class,
            RolePermissionsSeeder::class,
            LanguageSeeder::class,
            ReportTypeSeeder::class,
            ConfigVariableSeeder::class,
            UserPositionSeeder::class,
//            MenuSeeder::class,
            ServiceAreaTypesSeeder::class,
            SingleDatabaseSeeder::class,
            CountriesTableSeeder::class,
            CitiesTableSeeder::class,
            RestaurantsTableSeeder::class,
            RestaurantsAppsTableSeeder::class
        ]);
    }
}
