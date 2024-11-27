<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Share;
class SocialShareController extends Controller
{
    public function index()
    {
        $x = Share::page('http://www.google.com','Mawoud Educational Center')
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->telegram()->getRawLinks();
        dd($x);


    }
}
