<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Reviews;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reviews::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'id' => Str::uuid(),

            'content' => $this->faker->sentences(5, true),
            'rating' => random_int(1, 5),

            //
        ];
    }
}
