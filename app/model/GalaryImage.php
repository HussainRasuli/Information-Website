<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GalaryImage extends Model
{
    protected $table = 'galary_image';
    protected $primaryKey = 'galary_id';
    public $timestamps = false;
}
