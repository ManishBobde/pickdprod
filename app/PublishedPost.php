<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class PublishedPost extends Model
{
    protected $table ='publishedposts';

    public $timestamps= false;

     /**
     * Get the users for the blog post.
     */
    public function users()
    {
        return $this->belongsTo('App\User','creatorId');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function setNeedsPushNotificationAttribute($value)
    {
        $val = $value=="on"?true:false;
        $this->attributes['needsPushNotification'] = $val;
    }
}
