<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class InfoItem extends Model
{
    protected $table = 'info_item';
    protected $primaryKey = 'info_item_id';
    public $timestamps = false;
}
