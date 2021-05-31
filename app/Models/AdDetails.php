<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AdDetails extends Model
{
    use HasFactory;

    protected $fillable = ['from','to'];

function reviews(){
    return $this->hasOne(Reviews::class);
}
    function ads(){

        return $this->belongsTo(Ads::class);
    }

    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        return $query->where('to', '>=', $from)
            ->where('from', '<=', $to);
    }




}
