<?php

use Illuminate\Database\Seeder;
use Modules\ConfigModule\Entities\ConfigVariable;

class ConfigVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [];

        // quote default value
        $quote = [
            'variable' => 'quote',
            'variable_translation' => 'app.quote',
            'variable_parameters_translation' => [
                'ar' => 'رجل جائع ليس رجل حر.',
                'en' => 'A hungry man is not a free man.'
            ],
            'section' => 'guest',
            'scope' => 'global',
            'type' => 'string'
        ];
        $settings[] = $quote;

        // quote owner default value
        $quote_owner = [
            'variable' => 'quote_owner',
            'variable_translation' => 'app.quote_owner',
            'variable_parameters_translation' => [
                'ar' => 'أدلاي ستيفنسون الأول',
                'en' => 'Adlai Stevenson I'
            ],
            'section' => 'guest',
            'scope' => 'global',
            'type' => 'string'
        ];
        $settings[] = $quote_owner;

        // currency default value
        $currency = [
            'variable' => 'currency',
            'variable_translation' => 'app.currency',
            'variable_parameters_translation' => [
                'ar' => 'د.ك',
                'en' => 'kd'
            ],
            'section' => 'guest',
            'scope' => 'global',
            'type' => 'string'
        ];
        $settings[] = $currency;

        // logo default value
        $logo = [
            'variable' => 'logo',
            'variable_translation' => 'app.logo',
            'variable_parameters_translation' => [
                'ar' => 'https://st2.depositphotos.com/3577609/11835/v/950/depositphotos_118355644-stock-illustration-restaurant-logo-design.jpg',
                'en' => 'https://st2.depositphotos.com/3577609/11835/v/950/depositphotos_118355644-stock-illustration-restaurant-logo-design.jpg'
            ],
            'section' => 'guest',
            'scope' => 'global',
            'type' => 'string'
        ];
        $settings[] = $logo;

        // background default value
        $background = [
            'variable' => 'background',
            'variable_translation' => 'app.background',
            'variable_parameters_translation' => [
                'ar' => 'https://www.dhresource.com/0x0s/f2-albu-g5-M00-7F-35-rBVaI1j5ofqATRzAAAMLu49C9cw700.jpg/custom-retro-nostalgie-graffiti-wandtapete.jpg',
                'en' => 'https://www.dhresource.com/0x0s/f2-albu-g5-M00-7F-35-rBVaI1j5ofqATRzAAAMLu49C9cw700.jpg/custom-retro-nostalgie-graffiti-wandtapete.jpg'
            ],
            'section' => 'guest',
            'scope' => 'global',
            'type' => 'string'
        ];
        $settings[] = $background;

        $collection = collect($settings)->map(function($item){
            $item = $this->prepareToStore($item,['variable_parameters_translation','data']);
            ConfigVariable::create($item);
        });
    }

    // TODO: needs to create new trait to use this method
    private function prepareToStore($data,$keys = []){
        foreach ($data as $key => $value) {
            if(in_array($key, $keys))
                $data[$key] = json_encode($value);
        }
        return $data;
    }
}
