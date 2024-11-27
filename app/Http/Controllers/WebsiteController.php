<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Model\SliderImage;
use App\Model\Information;
use App\Model\InfoItem;
use App\Model\DonationDes;
use App\Model\EmailAddress;
use App\Model\Phone;
use App\Model\Address;
use App\Model\Activity;
use App\Model\ActivityDetails;
use App\Model\Teacher;
use App\Model\GalaryImage;
use App\Model\Slogan;
use Share;
class WebsiteController extends Controller
{
    public function showOnWebsite()
    {
       $data['info']              = Information::all();
       $data['info_item']         = InfoItem::all();
       $data['slider']            = SliderImage::all();
       $data['donation_des']      = DonationDes::all();
       $data['email']             = EmailAddress::all();
       $data['phone']             = Phone::all();
       $data['address']           = Address::all();
       $data['activity']          = Activity::all();
       $data['activity_details']  = ActivityDetails::all();
       $data['all_teacher']       = Teacher::all();
       $data['all_slogan']        = Slogan::all();
       $data['galary']            = GalaryImage::orderByDesc('galary_id')->get();

       $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
       ->facebook()
       ->twitter()
       ->whatsapp()
       ->linkedin()
       ->telegram()->getRawLinks();
 
       return view('website/layout/website_layout_page', $data);

    }

}
