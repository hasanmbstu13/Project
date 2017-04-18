<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkLog extends Model
{

    protected $table = 'works_log';

    protected $fillable = [
    	'works_id'
    ];

    public function works(){
        return $this->belongsTo('App\Work');
    }
}
