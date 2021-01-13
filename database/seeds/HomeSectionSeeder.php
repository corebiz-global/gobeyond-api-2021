<?php

use Illuminate\Database\Seeder;

use App\Models\HomeSection;
use App\Models\Banner;
use App\Models\Collection;
use App\Models\Product;

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

        $faker = Faker\Factory::create();

        foreach ($data as $section) {
            $homeSection = HomeSection::create($section);

            if ($homeSection->isTypeBanners()) {
                factory(Banner::class, $faker->numberBetween(1, 8))->make()
                    ->each(function($banner) use ($homeSection, $faker) {
                    $banner = $banner->toArray();
                    $banner['image'] = $faker->imageUrl(
                        $homeSection->dimensions['width'],
                        $homeSection->dimensions['height'],
                        'animals',
                        true
                    );

                    $homeSection->banners()->create($banner);
                });
            } else {
                $homeSection->collection()->create(factory(Collection::class)->make()->toArray());
                $products = Product::orderByRaw('RANDOM()')
                    ->limit($faker->numberBetween(4, 10))
                    ->get()->pluck('id');
                $homeSection->collection->products()->attach($products);
            }
        }
    }
}
