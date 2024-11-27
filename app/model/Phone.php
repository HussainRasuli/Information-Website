<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phone';
    protected $primaryKey = 'phone_id';
    public $timestamps = false;
}
