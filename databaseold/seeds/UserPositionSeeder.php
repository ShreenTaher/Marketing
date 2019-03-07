<?php

use Illuminate\Database\Seeder;
use Modules\User\Entities\Position;

class UserPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = [
            'ar' => ['name' => 'مدير'],
            'en' => ['name' => 'manager'],
            'is_active' => 1
        ];
        Position::create($manager);
    }
}
