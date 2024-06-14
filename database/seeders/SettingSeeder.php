<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seo_home_page = [
            [
                'key'     => 'description',
                'label'   => 'description',
                'value'   =>  'test test test',
                'section' => 'public'
            ],
            [
                'key'     => 'keywords',
                'label'   => 'keywords',
                'value'   =>  'test test test',
                'section' => 'public'
            ],
            [
                'key'     => 'title',
                'label'   => 'title',
                'value'   =>  'test test test',
                'section' => 'public'
            ],
        ];

        $logo = [
            [
                'key'     => 'logo',
                'label'   => 'فانورام',
                'value'   =>  'https://fakeimg.pl/300/',
                'section' => 'public'
            ],
            [
                'key'     => 'logo_alt',
                'label'   => 'فانورام',
                'value'   => 'فانورام',
                'section' => 'public'
            ],
        ];
        $banner = [
            [
                'key'     => 'banner',
                'label'   => 'فانورام',
                'value'   =>  'فانورام',
                'section' => 'public'
            ],
        ];

        $phone = [
            [
                'key'     => 'phone',
                'label'   => 'موبایل اصلی',
                'value'   =>  '09363933499',
                'section' => 'public'
            ],
        ];

        $body_footer = [
            [
                'key'     => 'body_footer',
                'label'   => 'توضیحات در فوتر',
                'value'   =>  'tes test test test test',
                'section' => 'public'
            ],
        ];

        $this->storeItems(
            $seo_home_page,
            $logo,
            $banner,
            $phone,
            $body_footer,
        );
    }
    public function storeItems(...$items)
    {
        foreach ($items as $item)
            foreach ($item as $value)
                Setting::create($value);
    }
}
