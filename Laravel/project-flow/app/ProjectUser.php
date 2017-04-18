<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
     protected $table = 'projects_users';

     public function project() 
    {
        return $this->belongsTo('App\ProjectUser','project_user');
    }
}
