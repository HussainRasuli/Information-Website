<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Model\GalaryImage;

class GalaryController extends Controller
{
    
    public function index()
    {
        $data = GalaryImage::orderByDesc('galary_id')->get();
        return view('admin_panel/galary/view_galary', compact('data'));
    }

    
    public function galary_form()
    {
        return view('admin_panel/galary/galary_form');
    }

    public function add_galary(Request $request)
    {
        $request->validate([
            'category'   => 'required',
            'photo'   => 'required'
        ]);

        $insert = new GalaryImage();
        $insert->title = $request->title;

        $path ='';
        if($request->file('photo'))
        {
            $path = Storage::disk('galary')->putFile('/', new File($request->file('photo')));
        }

        $insert->galary_image = $path;
        $insert->category_name = $request->category;
        $insert->save();

        Session::flash('add_galary_image','Successfully Added to Galary.');
        return redirect()->action([GalaryController::class , 'index']);
    }

  
    public function edit_galary($galary_id)
    {
        $data = GalaryImage::find($galary_id);
        return view('admin_panel/galary/edit_galary_modal', compact('data'));
    }


    public function update_galary(Request $request)
    {
        $request->validate([
            'category'   => 'required',
        ]);


        $id = $request->input('galary_id');
        $update = GalaryImage::find($id);
        $update->title = $request->title;
        $path = $update->galary_image;

        if($request->file('photo'))
        {
            Storage::disk('galary')->delete($update->galary_image);
            $path = Storage::disk('galary')->putFile('/', new File($request->file('photo')));
        }

        $update->galary_image = $path;
        $update->category_name = $request->category;
        $update->save();

        Session::flash('update_galary_image','Successfully Update.');
        return redirect()->action([GalaryController::class , 'index']);

    }
    

    public function delete_galary(Request $request)
    {
        $id = $request->input('id');
        $delete_galary = GalaryImage::find($id);

        Storage::disk('galary')->delete($delete_galary->galary_image);
        $delete_galary->delete();
        
        if($delete_galary == true)
        {
            return "Deleted";
        }
        else
        {
            return "Not Delete";
        }
    }
}
