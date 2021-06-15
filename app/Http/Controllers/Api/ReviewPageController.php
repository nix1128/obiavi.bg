<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewLeftCheckResource;
use App\Models\AdDetails;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewPageController extends Controller
{

    public function show($id)
    {

        return new ReviewLeftCheckResource(Reviews::findOrFail($id));
    }

    public function store(Request $request)
    {


        $data = $request->validate([

            'id' => 'required|size:36 |unique:reviews',
            'content' => 'required | min:2',
            'rating' => 'required|in:1,2,3,4,5'

        ]);
        $adDetailsReviewKey = AdDetails::getReviewKey($data['id']);

        if ($adDetailsReviewKey === null) {
            return abort('404');
        }

        //1 remove the UUID key
        //2save uuid key
        //3 make will create new instance of reviews model
        // with the $data returned to the user
        //4.Fetch the new key
        //5 fetch the ids
        $adDetailsReviewKey->review_key  = '';
        $adDetailsReviewKey->save();



        $review  = Reviews::make($data);
        $review->ads_id = $adDetailsReviewKey->id;
        $review->ads_id = $adDetailsReviewKey->ads_id;
        $review->save();

        return new ReviewLeftCheckResource($review);
    }
}
