<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\File;
use App\Model\Information;
use App\Model\InfoItem;
use App\Model\About;
use App\Model\EmailAddress;
use App\Model\Phone;
use App\Model\Address;
use App\Model\CoverImage;
use Share;

class AboutController extends Controller
{
    public function showOnWebsite(){
        $data['data']         = About::all();
        $data['email']        = EmailAddress::all();
        $data['phone']        = Phone::all();
        $data['address']      = Address::all();
        $data['info']         = Information::all();
        $data['cover_image']  = CoverImage::where('type','About_Page')->limit('1')->get();

        $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
       ->facebook()
       ->twitter()
       ->whatsapp()
       ->linkedin()
       ->telegram()->getRawLinks();

        return view('website/about/about_page', $data);
        
    }
   
    public function index()
    {
        $info_item = InfoItem::all();
        $info      = Information::all();
        return view('admin_panel/about/view_about',compact('info_item','info'));
    }

   
    public function about_form()
    {
        return view('admin_panel/about/about_form');
    }

    
    public function add_about(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'des'   => 'required|string'
        ]);

        $insert_title  = new Information();
        $insert_title->info_title = $request->title;
        $insert_title->info_des   = $request->des;
       
        $path ='';
        if($request->file('photo'))
        {
          $path = Storage::disk('about')->putFile('/', new File($request->file('photo')));
        
        }
        $insert_title->info_video  = $path;
        $insert_title->save();


        $items = $request->input('item');

      if($items != '')
      {
        foreach($items as $key => $value)
        {
            $insert_item = new InfoItem();
            $insert_item->item_name = $items[$key];
            $insert_item->save();
        }

      }
        
        
        Session::flash('added', 'Successfuly added');
        return redirect()->action([AboutController::class , 'index']);
    }

    
    public function edit_info($info_id)
    {
        $data = Information::find($info_id);
        return view('admin_panel/about/edit_info_modal', compact('data'));
    }

  
    public function update_info(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'des'   => 'required|string'
        ]);

        $info_id = $request->input('info_id');

        $update_info = Information::find($info_id);
        $update_info->info_title = $request->title;
        $update_info->info_des   = $request->des;

        $path='';
        if($request->file('photo') != ''){
            $path = Storage::disk('about')->putfile('/', new file($request->file('photo')));
            
            $one_col = Information::find($info_id);

            if($one_col != ''){
                Storage::disk('about')->delete($one_col->info_video);
            }

            $update_info->info_video  = $path;
        }

       
        $update_info->save();

        Session::flash('edit_info','Successfully Updated.');
        return redirect()->back();

    }

    
    public function delete_info(Request $request)
    {
    
         $info_id = $request->input('id');

         $delete_all_item = InfoItem::all();
         foreach($delete_all_item as $x){
             $x->delete();
         }

         $one_row = Information::find($info_id);
         Storage::disk('about')->delete($one_row->info_video);
         $one_row->delete();

         if($one_row == true){
            return 'Deleted';
         }
         else{
            return 'Not Delete';
         }
    }


    public function edit_item($info_item_id)
    {
        $data = InfoItem::find($info_item_id);
        return view('admin_panel/about/edit_info_item_modal', compact('data'));
    }



    public function update_item(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
        ]);

        $item_id = $request->input('item_id');

        $update_item = InfoItem::find($item_id);
        $update_item->item_name = $request->item;
        $update_item->save();

        Session::flash('edit_item','Successfully Updated.');
        return redirect()->back();
    }

    public function delete_item(Request $request)
    {
        $item_id = $request->input('id');

        $delete_item = InfoItem::find($item_id);
        $delete_item->delete();

        if($delete_item == true){
            return 'Deleted';
         }
         else{
            return 'Not Delete';
         }
    }


    public function item_form()
    {
        return view('admin_panel/about/add_item_modal');
    }


    public function add_item(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
        ]);

        $add_item = new InfoItem();
        $add_item->item_name = $request->item;
        $add_item->save();
        
        Session::flash('add_item','Successfully Added.');
        return redirect()->back();
    }




    // More Information Function //

    public function more_info()
    {
        $data = About::all();
        return view('admin_panel/details_about/view_more_info', compact('data'));
    }


    public function more_info_form()
    {
        return view('admin_panel/details_about/more_info_form');
    }

    public function add_more_info(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'des'   => 'required|string'
        ]);
        $insert_about = new About();
        $insert_about->about_title = $request->title;
        $insert_about->about_des   = $request->des;
        $insert_about->save();

        Session::flash('add_more_info','Successfully Added.');
        return redirect()->action([AboutController::class , 'more_info']);

    }


    public function edit_more_info($about_id)
    {
       $data = About::find($about_id);
       return view('admin_panel/details_about/more_info_modal',compact('data'));
    }


    public function update_more_info(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'des'   => 'required|string'
        ]);
        
        $about_id = $request->input('about_id');

        $update_more_info = About::find($about_id);
        $update_more_info->about_title = $request->title;
        $update_more_info->about_des   = $request->des;
        $update_more_info->save();

        Session::flash('update_more_info','Successfully Updated');
        return redirect()->back();
    }


    public function delete_more_info(Request $request)
    {
        $about_id = $request->input('id');

        $delete_more_info = About::find($about_id);
        $delete_more_info->delete();

        if($delete_more_info == true){
            return 'Deleted';
         }
         else{
            return 'Not Delete';
         }
    }



}
