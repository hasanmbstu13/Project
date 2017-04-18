<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'projects';

    protected $fillable = [
        'project_no',
        'project_text',
        'project_name',
        'company_name',
        'start_time',
        'deadline',
        'leader_id',
        'project_manager',
        'description',
        'status'
    ];

    /**
     * Get the user that leading this Project
     */
    public function teamleader()
    {
        return $this->belongsTo('App\User','leader_id');
    }

    /**
     * Get the poroject manager of this Project
     */
    public function projectmanager()
    {
        return $this->belongsTo('App\User','project_manager');
    }

    public function projectusers() 
    {
        return $this->hasMany('App\ProjectUser','project_user');
    }

    public function works() 
    {
        return $this->hasMany('App\Work');
    }

    public function users() {
        
        return $this->belongsToMany('App\User','projects_users');
    }

    public function work(){
        return $this -> hasOne('App\Work');
    }

    public function user(){
        return $this -> hasMany('App\User');
    }

    public function all_works($curr_date) 
    {
        return $this->hasMany('App\Work')->where($curr_date, '<=', 'next_deadline');
    }

    /**
     * Get project of a designer
     */
    public function designer_project($project_id=null, $user_id=null)
    {   
        if($project_id && $user_id){
            return $this->hasMany('App\Work')->whereIn('status',['queued','started'])->where(['project_id' => $project_id, 'user_id' => $user_id])->first();
        }
        // } else {
        //     return $this->hasMany('App\Work');
        // }
    }
    
}
