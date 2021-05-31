<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewsIndexResource;
use App\Models\Ads;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        $ads = Ads::findOrFail($id);
        return  ReviewsIndexResource::collection($ads->reviews()->latest()->get());
    }
}
