<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reviews extends Model
{
    use HasFactory;
    protected $fillable = ['id','content','rating'];

    function ads()
    {

        return $this->belongsTo(Ads::class);
    }

    function addetails()
    {

        return $this->belongsTo(AdDetails::class);
    }

    function getIncrementing()
    {
        //implementing UUID string as PK for this table
        return false; // get the value wheter the ID is incrementing
    }

    function getKeyType() // get auto increment key type
    {
        return 'string';
    }
}
