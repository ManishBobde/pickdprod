<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftedPost extends Model
{
    protected $table ='draftedposts';
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
}
