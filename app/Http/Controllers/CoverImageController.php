<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Model\CoverImage;

class CoverImageController extends Controller
{
    
    public function index()
    {
        $data = CoverImage::all();
        return view('admin_panel/CoverImage/view_cover_image', compact('data'));
    }

 
    public function cover_image_form()
    {
        return view('admin_panel/CoverImage/add_cover_image_modal');
    }


    public function add_cover_image(Request $request)
    {

        $images = CoverImage::all();

        if($images != ''){
            foreach($images as $x){
                  if($x->type ==  $request->type){
                        Session::flash('not_add_cover_image', 'Cover Image Exist in This Page. Please Try Again.');
                        return redirect()->action([CoverImageController::class , 'index']);
                     break;
                  }
            }
        }


        $insert = new CoverImage();
        $path ='';
        if($request->file('photo'))
        {
          $path = Storage::disk('CoverImage')->putFile('/', new File($request->file('photo')));
        }

        $insert->path = $path;
        $insert->type = $request->type;
        $insert->save();

        Session::flash('add_cover_image', 'Successfully added');
        return redirect()->action([CoverImageController::class , 'index']);

    }


    public function edit_cover_image($cover_id)
    {
        $data = CoverImage::find($cover_id);
        return view('admin_panel/CoverImage/edit_cover_image_modal', compact('data'));
    }


    public function update_cover_image(Request $request)
    {
        $cover_id = $request->input('cover_id');
        $update = CoverImage::find($cover_id);

        $old_type = $update->type;
        $new_type = $request->type;

        if($old_type != $new_type){
        $images = CoverImage::all();
        if($images != ''){
            foreach($images as $x){
                  if($x->type ==  $new_type){
                        Session::flash('not_add_cover_image', 'This Page has a Cover Image. Please Try Again.');
                        return redirect()->action([CoverImageController::class , 'index']);
                     break;
                  }
            }
          }
        }

        $path   = $update->path;

        if($request->file('photo'))
        {
          Storage::disk('CoverImage')->delete($update->path);
          $path = Storage::disk('CoverImage')->putFile('/', new File($request->file('photo')));
        }

        $update->path = $path;
        $update->type = $request->type;
        $update->save();
        
        Session::flash('edit_cover_image', 'Successfully Updated.');
        return redirect()->action([CoverImageController::class , 'index']);
    }



    public function delete_cover_image(Request $request)
    {
        $cover_id = $request->input('id');
        $delete_cover_image = CoverImage::find($cover_id);

        Storage::disk('CoverImage')->delete($delete_cover_image->path);
        $delete_cover_image->delete();

        if($delete_cover_image == true){
            return "Deleted";
        }
        else{
            return "Not Delete";
        }
    }
}
