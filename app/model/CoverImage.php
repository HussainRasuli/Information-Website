<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CoverImage extends Model
{
    protected $table = 'cover_image';
    protected $primaryKey = 'cover_id';
    public $timestamps = false;
}
