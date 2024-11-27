<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Model\Teacher;
use App\Model\Information;
use App\Model\EmailAddress;
use App\Model\Phone;
use App\Model\Address;
use App\Model\CoverImage;
use Share;


class TeacherController extends Controller
{

//---------- Website Functions -------------//

    public function showOnWebsite()
    {
        $data['email']        = EmailAddress::all();
        $data['phone']        = Phone::all();
        $data['address']      = Address::all();
        $data['info']         = Information::all();
        $data['cover_image']  = CoverImage::where('type','Teachers_Page')->limit('1')->get();

        $data['teachers'] = Teacher::orderByDesc('teacher_id')->limit('1')->get();
        $data['all_teacher'] = Teacher::orderByDesc('teacher_id')->get();

        $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->telegram()->getRawLinks();
        

        return view('website/teacher/all_teacher', $data);
    }

    public function teachers($teacher_id)
    {
        $data['email']        = EmailAddress::all();
        $data['phone']        = Phone::all();
        $data['address']      = Address::all();
        $data['info']         = Information::all();
        $data['cover_image']  = CoverImage::where('type','Teachers_Page')->limit('1')->get();

        $data['all_teacher'] = Teacher::orderByDesc('teacher_id')->paginate(4);
        $data['one_teacher'] = Teacher::find($teacher_id);
        
        $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->telegram()->getRawLinks();

        return view('website/teacher/teacher_page', $data);
    }


    public function see_other_teacher($teacher_id)
    {
        $data = Teacher::find($teacher_id);
        return view('website/teacher/see_other_teacher', compact('data'));
    }

//----------------- End --------------------//

//----------- Admin Panel Functions ------------//

    public function index()
    {
        $all_teacher = Teacher::orderByDesc('teacher_id')->get();
        return view('admin_panel/teacher/view_teacher', compact('all_teacher'));
    }

  
    public function teacher_form()
    {
        return view('admin_panel/teacher/teacher_form');
    }

   
    public function add_teacher(Request $request)
    {
        $request->validate([
            'firstname'   => 'required|string|max:255',
            'lastname'    => 'required|string|max:255', 
            'position'    => 'required|string|max:255',
            'photo'       => 'required'
        ]);

        $insert = new Teacher();
        $insert->teacher_name     = $request->firstname;
        $insert->teacher_lastname = $request->lastname;
        $insert->email            = $request->email;
        $insert->gender           = $request->gender;
        $insert->education        = $request->education;
        $insert->position         = $request->position;

        $path ='';
        if($request->file('photo'))
        {
            $path = Storage::disk('teacher')->putFile('/', new File($request->file('photo')));
        }

        $insert->teacher_image = $path;
        $insert->teacher_des   = $request->des;
        $insert->save();

        Session::flash('add_teacher','Successfully Added');
        return redirect()->action([TeacherController::class , 'index']);
    }

    
    public function edit_teacher($teacher_id)
    {
        $data = Teacher::find($teacher_id);
        return view('admin_panel/teacher/edit_teacher_modal', compact('data'));
    }


    public function update_teacher(Request $request)
    {

        $request->validate([
            'firstname'   => 'required|string|max:255',
            'lastname'    => 'required|string|max:255', 
            'position'    => 'required|string|max:255',
        ]);

        $id = $request->input('teacher_id');

        $update = Teacher::find($id);
        $update->teacher_name = $request->firstname;
        $update->teacher_lastname = $request->lastname;
        $update->email            = $request->email;
        $update->gender           = $request->gender;
        $update->education        = $request->education;
        $update->position         = $request->position;
        
        $path = $update->teacher_image;

        if($request->file('photo'))
        {
            Storage::disk('teacher')->delete($update->teacher_image);
            $path = Storage::disk('teacher')->putFile('/', new File($request->file('photo')));
            
        }

        $update->teacher_image = $path;
        $update->teacher_des   = $request->des;
        $update->save();

        Session::flash('update_teacher','Successfully Updated');
        return redirect()->action([TeacherController::class , 'index']);
    }
    

    public function view_teacher($teacher_id)
    {
        $data = Teacher::find($teacher_id);
        return view('admin_panel/teacher/view_teacher_modal', compact('data'));
    }

   

    
    public function delete_teacher(Request $request)
    {
        $id = $request->input('id');
        $delete = Teacher::find($id);
        Storage::disk('teacher')->delete($delete->teacher_image);
        $delete->delete();

        if($delete == true){
            return "Deleted";
        }
        else{
            return "Not Delete";
        }
    }
}
