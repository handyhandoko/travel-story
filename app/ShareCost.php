<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareCost extends Model
{
    protected $dates = ['end_time'];
    /**
     * Get images of sharecost.
     */
    public function images()
    {
        return $this->hasMany('App\ShareCostImage');
    }
}
