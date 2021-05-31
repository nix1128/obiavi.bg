<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\AdDetails;

use Illuminate\Database\Seeder;


class AdDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Ads::all()->each(function (Ads $ads) { // to add fake data to every object / take all
            $addetail = AdDetails::factory()->make();
            $addetails = collect([$addetail]);

            for ($i = 0; $i < random_int(1, 20); $i++) {
                $from = (clone $addetail->to)->addDays(random_int(1, 14));
                $to  = (clone $from)->addDays(random_int(1, 14));

                $addetail = AdDetails::make([
                    'from' => $from,
                    'to' => $to,
                ]);

                $addetails->push($addetail);
            }

            $ads->addetails()->saveMany($addetails);
        });
    }
}
