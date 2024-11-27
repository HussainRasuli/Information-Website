<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\Slogan;

class SloganController extends Controller
{
   
    public function index()
    {
        $data = Slogan::all();
        return view('admin_panel/slogan/view_slogan', compact('data'));
    }

    
    public function slogan_form()
    {
        return view('admin_panel/slogan/slogan_form_modal');
    }


    public function add_slogan(Request $request)
    {
      $x = Slogan::all();
      $y = count($x);
      if($y < 3){
        $insert = new Slogan();
        $insert->slogan_title = $request->title;
        $insert->slogan_des   = $request->des;
        $insert->save();
  
        Session::flash('add_slogan','Successfully Added.');
        return redirect()->action([SloganController::class , 'index']);
      }
      else{
        Session::flash('error_slogan','You con not enter more than three slogans.');
        return redirect()->action([SloganController::class , 'index']);
      }

    }

    public function edit_slogan($slogan_id)
    {
        $data = Slogan::find($slogan_id);
        return view('admin_panel/slogan/edit_slogan_modal', compact('data'));

    }

  
    public function update_slogan(Request $request)
    {
        $slogan_id = $request->input('slogan_id');
        $update =  Slogan::find($slogan_id);
        $update->slogan_title = $request->title;
        $update->slogan_des   = $request->des;
        $update->save();

        Session::flash('edit_slogan','Successfully Updated.');
        return redirect()->action([SloganController::class , 'index']);
    }

 
    public function delete_slogan(Request $request)
    {
        $slogan_id = $request->input('id');
        $delete =  Slogan::find($slogan_id);
        $delete->delete();

        if($delete == true){
            return "Deleted";
        }
        else{
            return "Not Delete";
        }
    }
}
