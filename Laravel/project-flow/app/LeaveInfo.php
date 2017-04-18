<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveInfo extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    /**
     * This will return the manager who approved the leave
     */
    public function manager(){
    	return $this->belongsTo('App\User','leave_added_by');
    }
}
