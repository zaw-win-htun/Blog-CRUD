<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
        'user_id'
    ];

    protected $date = ['published_at'];

    public function scopePublished($query)
    {
    	$query->where('published_at', '<=' , Carbon::now());
    }

    public function scopeUnPublished($query)
    {
    	$query->where('published_at', '>' , Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d' , $date);
    }


    /* an article is owned by a user */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
