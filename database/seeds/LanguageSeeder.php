<?php

use Illuminate\Database\Seeder;
use Modules\LocaleModule\Entities\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'lang' => 'ar',
            'active' => '1',
            'name' => 'arabic',
            'dir' => 'rtl'
        ]);

        Language::create([
            'lang' => 'en',
            'active' => '1',
            'name' => 'english',
            'dir' => 'ltr'
        ]);
    }
}
