<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';
    protected $primaryKey = 'info_id';
    public $timestamps = false;
}
