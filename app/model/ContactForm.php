<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $table = 'contact_form';
    protected $primaryKey = 'contact_form_id';
    public $timestamps = false;
}
