<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * Get images of story.
     */
    public function images()
    {
        return $this->hasMany('App\StoryImage');
    }
}
