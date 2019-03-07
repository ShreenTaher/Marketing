<?php

use Illuminate\Database\Seeder;
use Modules\ReportModule\Entities\ReportType;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $violation = [
            'ar'  => ['type' => 'انتهاك'],
            'en'  => ['type' => 'violation'],
        ];

        ReportType::create($violation);

        $feedback = [
            'ar' => ['type' => 'رأي'],
            'en' => ['type' => 'feedback'],
        ];
        ReportType::create($feedback);
    }
}
