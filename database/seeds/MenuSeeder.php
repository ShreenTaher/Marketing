<?php

use Illuminate\Database\Seeder;
use Modules\MenuModule\Entities\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sidemenu = [
            'bg_photo' =>  'https://picsum.photos/1000/150',
            'main_photo' => 'https://picsum.photos/1000/150',
            'text_color' => '#000',
            'bg_color' => '#fff',
            'is_visible' => 1,
            'is_side_menu' => 1,

            'ar'  => ['title' => 'قائمه جانبيه','description' => 'قائمه جانبيه بيها اطباق مجانيه'],
            'en'  => ['title' => 'Side Menu','description' =>'Side Menu Contains Free Dishes'],
        ];

        Menu::create($sidemenu);
    }
}
