<?php

namespace Database\Factories;

use Carbon\Carbon;


use App\Models\AdDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()

    {
        $from = Carbon::instance($this->faker->dateTimeBetween('-1 months', '+1 months'));
        $to = (clone $from)->addDays(random_int(0, 14));

        return [
            'from' => $from,
            'to' => $to,
        ];
    }
};
