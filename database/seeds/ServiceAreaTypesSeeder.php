<?php

use Illuminate\Database\Seeder;
use Modules\ManagmentModule\Entities\ServiceAreaType;

class ServiceAreaTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indoor = [
            'ar'  => ['name' => 'مكان داخلي'],
            'en'  => ['name' => 'indoor'],
        ];
        ServiceAreaType::create($indoor);

        $outdoor = [
            'ar'  => ['name' => 'مكان خارجى'],
            'en'  => ['name' => 'outdoor'],
        ];
        ServiceAreaType::create($outdoor);
    }
}
