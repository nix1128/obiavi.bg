<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ads extends Model
{
    use HasFactory;

    function addetails()
    {
        return  $this->hasMany(AdDetails::class);
    }

    function reviews()
    {
        return  $this->hasMany(Reviews::class);
    }

    // qry scope
    function availableFor($from, $to): bool
    {


        // to all in the list from addtetails() add betwwen dates from AdDetails
        return 0 === $this->addetails()->betweenDates($from, $to)->count();
    }
}
