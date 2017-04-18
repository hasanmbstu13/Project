<?php

namespace App;
use Carbon;
use DateTime;
use CAST;

use Cartalyst\Sentinel\Users\EloquentUser;
/*use Illuminate\Database\Eloquent\Model;*/

class User extends EloquentUser {
    //

    protected $hidden = ['password', 'remember_token'];


    /**
     * Get the Works assign to this user
     */
    public function works($current_date = null)
    {   
        // $current_date = Carbon\Carbon::now();
        // $current_date = date("Y-m-d H:i:s");

        if($current_date){
            return $this->hasMany('App\Work')->whereIn('status',['started','queued'])->whereDate('next_deadline','>=',date('Y:m:d', strtotime($current_date)))->whereDate('est_start_time','<=',date('Y:m:d', strtotime($current_date)));
        } else {
            return $this->hasMany('App\Work');
        }
    }

    public function leader()
    {
        return $this->hasMany('App\Project','leader_id','id');
    }

    // next 15 days work sort by start days
    public function calworks()
    {
        return $this->hasMany('App\Work','user_id','id');
    }

    // Here project_users is the pivot(relational) table
    public function projects() {
        
        return $this->belongsToMany('App\Project','projects_users');
    }

    public function works_list()
    {
        // return $this->hasManyThrough('App\Work', 'App\Project', 'project_id', 'id');
        // return $this->hasManyThrough('App\Work', 'App\Project');
        // return $this->hasManyThrough('App\Work', 'App\Project');
        return $this->morphToMany('App\Work');
    }

    public function work(){
        return $this -> hasOne('App\Work');
    }

    public function user_role(){
        return $this -> hasOne('App\RoleUser');
    }

    public function project(){
        return $this -> hasMany('App\Project');
    }

    /**
     * Get the all leaves for an user.
     */
    public function leaves(){
        return $this->hasMany('App\LeaveInfo');
    }
}
