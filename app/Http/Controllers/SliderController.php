<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\File;
use App\Model\SliderImage;


class SliderController extends Controller
{
    
    public function index()
    {
        $image = SliderImage::all();
        return view('admin_panel.slider.view_slider', compact('image'));
    }


    public function slider_form()
    {
       return view('admin_panel.slider.slider_form');
    }



    public function add_slider(Request $request)
    {
        $request->validate([

            'photo' => 'required'
            
        ]);

        $insert_title  = new SliderImage();
        $path ='';
        if($request->file('photo'))
        {
          $path = Storage::disk('slider')->putFile('/', new File($request->file('photo')));
        }

        $insert_title->slider_image = $path;
        $insert_title->slider_title = $request->title;
        $insert_title->slider_des   = $request->des;
        $insert_title->save();
        
        Session::flash('added', 'Successfuly added');
        return redirect()->action([SliderController::class,'index']);
    }



    public function edit_image($slider_img_id)
    {

        $data = SliderImage::find($slider_img_id);
        return view('admin_panel/slider/edit_image_modal',compact('data'));

    }


    public function update_slider_image(Request $request)
    {
        $slider_id = $request->input('slider_id');
        $update      = SliderImage::find($slider_id);
        $path = $update->slider_image;

        if($request->file('photo') != '')
        {
            Storage::disk('slider')->delete($update->slider_image);
            $path = Storage::disk('slider')->putfile('/', new file($request->file('photo')));
        }

        $update->slider_image  = $path;
        $update->slider_title  = $request->title;
        $update->slider_des    = $request->des;
        $update->save();

        Session::flash('edit_slider_image','Successfully Updated.');
        return redirect()->back();
    }

    
    public function delete_slider_image(Request $request)
    {
        $id_img = $request->input('id');
        $image_id = SliderImage::find($id_img);

        Storage::disk('slider')->delete($image_id->slider_image);
        $image_id->delete();

        if($image_id == true){
           return 'Deleted';
        }
        else{
           return 'Not Delete';
        }
    }
}
