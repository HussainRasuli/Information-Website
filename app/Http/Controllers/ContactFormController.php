<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\ContactForm;

class ContactFormController extends Controller
{
  
    public function index()
    {
        $data['data'] = ContactForm::all();
        return view('admin_panel/contact_form/view_contact_form',$data);
    }

  
    public function view_contact_form()
    {
        return view('admin_panel/contact_form/add_contact_form');
    }

   
    public function add_contact_form(Request $request)
    {
        $insert_text = new ContactForm();
        $insert_text->contact_form_text = $request->des;
        $insert_text->save();

       Session::flash('add_contact_form_text','Successfully Added');
       return redirect()->action([ContactFormController::class , 'index']);
    }

   
    public function edit_contact_form($text_id)
    {
        $data = ContactForm::find($text_id); 
        return view('admin_panel/contact_form/contact_form_modal', compact('data'));
    }


    public function update_contact_form(Request $request)
    {
        $id = $request->input('about_id');
        $update = ContactForm::find($id);
        $update->contact_form_text = $request->des;
        $update->save();
        Session::flash('update_contact_form','Successfully Updated');
        return redirect()->action([ContactFormController::class , 'index']);
    }

    public function delete_contact_form(Request $request)
    {
       $contact_form_id = $request->input('id');
       $delete_text = ContactForm::find($contact_form_id);
       $delete_text->delete();

        if($delete_text == true){
            return 'Deleted';
        }
        else{
            return 'Not Delete';
        }
    }
}
