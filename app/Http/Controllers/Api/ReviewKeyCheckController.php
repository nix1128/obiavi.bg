<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdDetailsByReviewKeyResource;
use App\Models\AdDetails;

use Illuminate\Http\Request;

class ReviewKeyCheckController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($reveiewKey, Request $request)
    {

        $ad = AdDetails::getReviewKey($reveiewKey);
          return $ad ? new AdDetailsByReviewKeyResource ($ad) : abort('404'); //the static method from AdDetails
    }
}
