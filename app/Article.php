<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'feature_image', 'slug',
        'body', 'published_date'
    ];

    protected $with = ['seo'];

    public function setPublishedDateAttribute($value)
    {
        list($date, $time) = explode(' ' , $value);
        list($year, $month, $day) = explode('/', $date);
        $date = implode('-', \Verta::getGregorian($year, $month, $day));
        $this->attributes['Published_date'] = implode(' ', [$date, $time]);
    }

    public function getPublishedDateAttribute($value)
    {
        list($date, $time) = explode(' ' , $value);
        list($year, $month, $day) = explode('-', $date);
        $date = implode('/', \Verta::getJalali($year, $month, $day));
        $published_date = implode(' ', [$date, $time]);

        return $published_date;
    }

    public function getFeatureImageAttribute($feature_image)
    {
        return '/storage/' . $feature_image;
    }

    public function seo()
    {
        return $this->morphOne('App\Seo', 'seoble');
    }
}
