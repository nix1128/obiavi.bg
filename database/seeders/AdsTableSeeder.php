<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Ads;
class AdsTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ads::factory()
        ->count(50)

        ->create();

    }
}


