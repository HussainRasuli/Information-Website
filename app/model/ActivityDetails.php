<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ActivityDetails extends Model
{
    protected $table = 'activity_details';
    protected $primaryKey = 'act_detial_id';
    public $timestamps = false;



    public function act_detail()
    {
        return $this->hasOne('App\Model\Activity', 'activity_id','activity_id');
    }
}
