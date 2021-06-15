<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdDetailsByReviewKeyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'addetails_id' => $this->id,
            'from' => $this->from,
            'to' => $this->to,

            'ads' => new AdDetailsByReviewAdsResource($this->ads)



        ];
    }
}
