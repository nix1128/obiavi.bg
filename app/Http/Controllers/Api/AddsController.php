<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\AdsShowResource;
use App\Models\Ads;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdsIndexResource;
use Illuminate\Http\Request;

class AddsController extends Controller
{
    public function index(){

        return AdsIndexResource::collection(Ads::all());;
    }

    public function show ($id){
        return new AdsShowResource(Ads::findOrFail($id));
    }
}
