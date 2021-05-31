<?php

namespace Database\Factories;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Factories\Factory;




class AdsFactory extends Factory
{





    protected $model = Ads::class;



    public function definition($suffix = ['Vila', 'Hause', 'Book', 'Bicycle', 'Rooms', 'View', 'Car'])

    {
        return [
            'title' => $this->faker->city($suffix),
            'content' => $this->faker->text(190),
            'price' => $this->faker->numberBetween($min = 150, $max = 600),

        ];
    }
}
