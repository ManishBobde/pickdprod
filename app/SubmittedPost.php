<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmittedPost extends Model
{
    protected $table ='submittedposts';

    public $timestamps =false;

    /**
     * Get the users for the blog post.
     */
    public function users()
    {
        return $this->belongsTo('App\User','creatorId');
    }

    /**
     * Get the state for the blog post.
     */
    public function state()
    {
        return $this->belongsTo('App\ContentState','stateId');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
