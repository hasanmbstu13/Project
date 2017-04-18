<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{


    /**
     * Get the user own that work
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user own that work
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    // public function user(){
    //     return $this->belongsTo('Customer');
    // }

    public function works(){
        return $this->belongsTo('App\Project');
    }

    public function work_logs(){
        return $this->hasMany('App\WorkLog');
    }
}
