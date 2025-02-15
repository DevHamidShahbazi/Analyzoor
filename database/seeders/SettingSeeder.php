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
                'value'   => 'آموزش برنامه نویسی و طراحی اختصاصی سایت از صفر تا بازار کار بدون پیش نیاز',
                'section' => 'public'
            ],
            [
                'key'     => 'keywords',
                'label'   => 'keywords',
                'value'   =>  'برنامه نویسی,آموزش برنامه نویسی,آموزش طراحی سایت',
                'section' => 'public'
            ],
            [
                'key'     => 'title',
                'label'   => 'title',
                'value'   =>  'آموزش برنامه نویسی سایت از صفر تا بازار کار',
                'section' => 'public'
            ],
        ];


        $logo = [
            [
                'key'     => 'logo',
                'label'   => 'آنالیزور',
                'value'   =>  'https://fakeimg.pl/300/',
                'section' => 'public'
            ],
            [
                'key'     => 'logo_alt',
                'label'   => 'آنالیزور',
                'value'   => 'آنالیزور',
                'section' => 'public'
            ],
        ];
        $banner = [
            [
                'key'     => 'banner',
                'label'   => 'آنالیزور',
                'value'   =>  'آنالیزور',
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

        $seo_article_page = [
            [
                'key'     => 'article_description',
                'label'   => 'description صفحه مقالات',
                'value'   =>  'test test test',
                'section' => 'public'
            ],
            [
                'key'     => 'article_keywords',
                'label'   => 'keywords صفحه مقالات',
                'value'   =>  'test test test',
                'section' => 'public'
            ],
            [
                'key'     => 'article_title',
                'label'   => 'title صفحه مقالات',
                'value'   =>  'test test test',
                'section' => 'public'
            ],
        ];

        $articles_home = [
            [
                'key'     => 'articles_home',
                'label'   => 'مقالات در صفحه اصلی',
                'value'   =>  [],
                'section' => 'public'
            ],
        ];

        $this->storeItems(
            $articles_home,
            $seo_home_page,
            $seo_article_page,
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
