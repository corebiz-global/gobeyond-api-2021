<?php

use Illuminate\Database\Seeder;

use App\Models\HomeSection;

class HomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'order' => 1,
                'type' => 'banners',
                'dimensions' => [ 'width' => 414, 'height' => 448 ]
            ],
            [
                'type' => 'banners',
                'order' => 2,
                'dimensions' => [ 'width' => 380, 'height' => 90 ]
            ],
            [
                'type' => 'collection',
                'order' => 3,
                'dimensions' => null
            ],
            [
                'type' => 'banners',
                'order' => 4,
                'dimensions' => [ 'width' => 380, 'height' => 344 ]
            ],
        ];

        foreach ($data as $section) {
            $homeSection = HomeSection::create($section);
        }
    }
}
