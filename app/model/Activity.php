<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'activity_id';
    public $timestamps = false;



    public function act()
    {
        return $this->hasOne('App\Model\ActivityDetails', 'activity_id','activity_id');
    }
}

