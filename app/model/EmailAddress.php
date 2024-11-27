<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class EmailAddress extends Model
{
    protected $table = 'email_address';
    protected $primaryKey = 'email_id';
    public $timestamps = false;
}
