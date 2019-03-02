<?php

use App\App;
use Illuminate\Database\Seeder;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $apps = collect(['menu','management'])->map(function($name) {
            return App::create([
                'app_name'=>$name,
            ]);
        });
    }
}
