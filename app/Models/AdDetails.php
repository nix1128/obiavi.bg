<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AdDetails extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to'];

    function ads()
    {

        return $this->belongsTo(Ads::class);
    }

    function reviews()
    {
        return $this->hasOne(Reviews::class);
    }


    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        return $query->where('to', '>=', $from)
            ->where('from', '<=', $to);
    }

    //  static quiery to ReviewKeyCheckController
    public static function getReviewKey(string $reviewKey): ?AdDetails  // the model or null
    {

        return static::where('review_key', $reviewKey)->with('ads')->get()->first();

    }


    // define Model behaviour
    // call model parent boot() method from the Model
    // register event from static class AdDetails
    // адваме ключа преди модела да бъде записан

    protected static function boot()
    {

        parent::boot();
        static::creating(function ($add) {
            // handling when model is created
            $add->review_key = Str::uuid();
        });
    }
}
