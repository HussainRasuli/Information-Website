<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Slogan extends Model
{
    protected $table = 'slogan';
    protected $primaryKey = 'slogan_id';
    public $timestamps = false;
}
