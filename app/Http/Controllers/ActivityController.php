<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use App\Model\Activity;
use App\Model\ActivityDetails;
use App\Model\Information;
use App\Model\EmailAddress;
use App\Model\Phone;
use App\Model\Address;
use App\Model\CoverImage;
use Share;
class ActivityController extends Controller
{

//-------------- Website Functions ---------------//

    public function showOnWebsite(){

        $data['email']        = EmailAddress::all();
        $data['phone']        = Phone::all();
        $data['address']      = Address::all();
        $data['info']         = Information::all();
        $data['cover_image']  = CoverImage::where('type','Activity_Page')->limit('1')->get();

        $data['all_video'] = DB::table('activity_details')->join('activity', 'activity.activity_id', '=' , 'activity_details.activity_id')
        ->select(
            'activity_details.*',
            'activity.*'
            )
        ->orderByDesc('act_detial_id')->paginate(5);

        $data['one_video'] = DB::table('activity_details')->join('activity', 'activity.activity_id', '=' , 'activity_details.activity_id')
        ->select(
            'activity_details.*',
            'activity.*'
            )
        ->orderByDesc('act_detial_id')->limit('1')->get();

        $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
       ->facebook()
       ->twitter()
       ->whatsapp()
       ->linkedin()
       ->telegram()->getRawLinks();

        return view('website/activity/all_activity', $data);

    }


    public function activity_details(Request $request ,$activity_id)
    {
        $data['email']        = EmailAddress::all();
        $data['phone']        = Phone::all();
        $data['address']      = Address::all();
        $data['info']         = Information::all();
        $data['cover_image']  = CoverImage::where('type','Activity_Page')->limit('1')->get();

        $data['activity_detail'] = Activity::find($activity_id)->act;
        $data['activity'] = Activity::find($activity_id);

        $data['all_video'] = DB::table('activity_details')->join('activity', 'activity.activity_id', '=' , 'activity_details.activity_id')
        ->select(
            'activity_details.*',
            'activity.*'
            )
        ->orderByDesc('act_detial_id')->paginate(5);
        
        $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->telegram()->getRawLinks();
        
        return view('website/activity/our_activity', $data);
    }


    public function see_other_video($act_detial_id)
    {

        $activity_detail = ActivityDetails::find($act_detial_id);
        $id = $activity_detail->activity_id;
        $activity = Activity::find($id);

        return view('website/activity/see_other_video',compact('activity_detail','activity'));
    }


    public function search_video(Request $request)
    {
       $data = $request->input('search');

       $all_video = DB::table('activity_details')->join('activity', 'activity.activity_id', '=' , 'activity_details.activity_id')
        ->select(
            'activity_details.*',
            'activity.*'
            )->where('activity_title','like', "%".$data."%")->orderByDesc('act_detial_id')->get();
        
        return view('website/activity/search_video',compact('all_video'));
    }


//---------------- End ------------------------// 

//------------ Admin Panel Functions --------------//


    public function index()
    {
        $activity = Activity::all();
        $activity_detail = ActivityDetails::orderByDesc('act_detial_id')->paginate(5);

        return view('admin_panel/activity/view_activity', compact('activity','activity_detail'));
    }

   
    public function activity_form()
    {
        return view('admin_panel/activity/activity_form');
    }

   
    public function add_dropify()
    {
        return view('admin_panel/activity/dropify');
    }

    
    public function add_link()
    {
        return view('admin_panel/activity/link');
    }
     
    
    public function store_activity(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'photo'   => 'required', 
        ]);


        if(!$request->has('link') && !$request->has('video')){
            $request->validate([
            'link'   => 'required',
          ]);
        }
        elseif($request->has('link')){
            $request->validate([
                'link'   => 'required',
              ]);
        }
        else{
            $request->validate([
                'video'   => 'required',
              ]);
        }

      


        $insert_activity = new Activity();
        $insert_activity->activity_title = $request->title;

        $path ='';
        if($request->file('photo'))
        {
            $path = Storage::disk('activity_image')->putFile('/', new File($request->file('photo')));
        }
        $insert_activity->activity_image = $path;
        $insert_activity->save();
        $last_id = $insert_activity->activity_id;


        $insert_activity_detail = new ActivityDetails();
        $insert_activity_detail->act_det_des = $request->des;

        $file='';
        $type='';
        if($request->has('link')){
            
            $file = $request->input('link');
            $type ="Link";
        }
        if($request->has('video')){

            $file = Storage::disk('activity_video')->putFile('/', new File($request->file('video')));
            $type ="Video";
        }
       

        $insert_activity_detail->video_or_link = $file;
        $insert_activity_detail->type = $type;
        $insert_activity_detail->activity_id   = $last_id;
        $insert_activity_detail->save();

        Session::flash('add_activity', 'Successfuly added');
        return redirect()->action([ActivityController::class , 'index']);
    }

    
    public function activity_cover($activity_id)
    {
       $data = Activity::find($activity_id);
       return view('admin_panel/activity/activity_cover' ,compact('data'));
    } 

   
    public function edit_activity($act_detial_id)
    {
        $data = ActivityDetails::find($act_detial_id);
        if($data->type == 'Video'){
            return view('admin_panel/activity/edit_activity_video_modal', compact('data'));
        }
        if($data->type == 'Link'){
            return view('admin_panel/activity/edit_activity_link_modal', compact('data'));
        }
    }


    public function update_video(Request $request)
    {
       $id = $request->input('act_detial_id');
       $update = ActivityDetails::find($id);
       $update->act_det_des = $request->des;
       $path = $update->video_or_link;

        if($request->file('video') != ''){

            Storage::disk('activity_video')->delete($update->video_or_link);
            $path = Storage::disk('activity_video')->putfile('/', new file($request->file('video')));

        }

       $update->video_or_link = $path;
       $update->save();

       Session::flash('edit_video', 'Successfuly Updated');
       return redirect()->action([ActivityController::class , 'index']);
    }


    public function edit_link(Request $request)
    {
        $id = $request->input('act_detial_id');
        $update = ActivityDetails::find($id);
        $update->act_det_des = $request->des;
        $update->video_or_link = $request->link;
        $update->save();

        Session::flash('edit_video', 'Successfuly Updated');
        return redirect()->action([ActivityController::class , 'index']);
    }


    public function edit_activity_cover($activity_id)
    {
       $data = Activity::find($activity_id);
       return view('admin_panel/activity/edit_activity_cover_modal' ,compact('data'));
    }


    public function update_cover(Request $request)
    {
        $id = $request->input('activity_id');
        $update = Activity::find($id);
        $update->activity_title = $request->title;
        $path = $update->activity_image;
 
         if($request->file('photo') != ''){
 
             Storage::disk('activity_image')->delete($update->activity_image);
             $path = Storage::disk('activity_image')->putfile('/', new file($request->file('photo')));
 
         }
 
        $update->activity_image = $path;
        $update->save();
 
        Session::flash('edit_cover', 'Successfuly Updated');
        return redirect()->action([ActivityController::class , 'index']);
    }


    public function delete_activity(Request $request)
    {
         $id = $request->input('id');
         $delete_details = ActivityDetails::find($id);
         $activity_id = $delete_details->activity_id;

         $delete_activity = Activity::find($activity_id);
         Storage::disk('activity_image')->delete($delete_activity->activity_image);
         $delete_activity->delete();

        if($delete_details->type == 'Video')
        {
            Storage::disk('activity_video')->delete($delete_details->video_or_link);
        }
         
         $delete_details->delete();

         if($delete_details == true || $delete_activity == true)
         {
             return "Deleted";
         }
         else{
             return "Not Deleted";
         }

    }
}
