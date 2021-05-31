<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\Reviews;



use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ads::all()->each(function (Ads $ads) {
            $rev = Reviews::factory( random_int(5, 30))->make();
            $ads->reviews()->saveMany($rev);
        });
    }
}
