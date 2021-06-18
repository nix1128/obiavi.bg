<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PriceSetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        $ads_price = Ads::findOrFail($id);

        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:now',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from'
        ]);


        $days = (new Carbon($data['from']))->diffInDays(new Carbon($data['to'])) + 1;

        $price = $days * $ads_price->price;

        return response()->json([
            'data' => [
                'total' => $price,
                'breakdown' => [
                    $ads_price->price => $days
                ]
            ]
        ]);
    }
}
