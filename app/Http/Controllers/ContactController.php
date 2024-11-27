<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\EmailAddress;
use App\Model\Phone;
use App\Model\Address;
use App\Model\Information;
use App\Model\CoverImage;
use App\Mail\ContactMail;
use App\Model\ContactForm;
use Mail;
use Share;
class ContactController extends Controller
{
    public function showOnWebsite(){
        
        $data['contact_form'] = ContactForm::all();
        $data['email']        = EmailAddress::all();
        $data['phone']        = Phone::all();
        $data['address']      = Address::all();
        $data['info']         = Information::all();
        $data['cover_image']  = CoverImage::where('type','Contact_Page')->limit('1')->get();

        $data['all_links'] = Share::page('http://www.google.com','Mawoud Educational Center')
       ->facebook()
       ->twitter()
       ->whatsapp()
       ->linkedin()
       ->telegram()->getRawLinks();

        return view('website/contact/contact_page', $data);
        
    }
   
    public function sendEmail(Request $request)
    {
        $validations = $request->validate([
            'g-recaptcha-response'   => 'required'
        ]);

        $details = [
         'name' => $request->name,
         'email' => $request->email,
         'phone_number' => $request->phone_number,
         'subject' => $request->subject,
         'message' => $request->message
       ];
    
       Mail::to('mawoudacademy@gmail.com')->send(new ContactMail($details));

       return back()->with('message_sent','Your message has been sent successfully,Thank you so much.');
    }

    
    public function index()
    {
        $data['email'] = EmailAddress::all();
        $data['phone'] = Phone::all();
        $data['address'] = Address::all();
        return view('admin_panel/contact/view_contact', $data);
    }

    
    public function view_email_modal()
    {
        return view('admin_panel/contact/email_modal');
    }

    
    public function add_email(Request $request)
    {
         $insert_email = new EmailAddress();
         $insert_email->email = $request->email;
         $insert_email->save();
        Session::flash('add_email','Successfully Added');
        return redirect()->action([ContactController::class , 'index']);
    }

    
    public function view_phone_modal()
    {
        return view('admin_panel/contact/phone_modal');
    }

   
    public function add_phone(Request $request)
    {
         $insert_phone = new Phone();
         $insert_phone->phone = $request->phone;
         $insert_phone->save();
        Session::flash('add_phone','Successfully Added');
        return redirect()->action([ContactController::class , 'index']);
    }

   
    public function view_address_modal()
    {
        return view('admin_panel/contact/address_modal');
    }

    
    public function add_address(Request $request)
    {
         $insert_address = new Address();
         $insert_address->address = $request->address;
         $insert_address->save();
        Session::flash('add_address','Successfully Added');
        return redirect()->action([ContactController::class , 'index']);
    }

    public function delete_all(Request $request)
    {
       $delete_email = EmailAddress::truncate();

       $delete_phone = Phone::truncate();
       
       $delete_address = Address::truncate();

    if($delete_email == true || $delete_phone == true || $delete_address == true){
        return 'Deleted';
     }
     else{
        return 'Not Delete';
     }

    }


    public function edit_email_modal($email_id)
    {
       $data = EmailAddress::find($email_id); 
       return view('admin_panel/contact/edit_email_modal', compact('data'));
    }


    public function update_edit_email(Request $request)
    {
        $id = $request->input('email_id');
        $update = EmailAddress::find($id);
        $update->email = $request->email;
        $update->save();
        Session::flash('update_edit_email','Successfully Updated');
        return redirect()->action([ContactController::class , 'index']);
    }

    
    public function delete_edit_email(Request $request)
    {
       $email_id = $request->input('id');
       $delete_email = EmailAddress::find($email_id);
       $delete_email->delete();

        if($delete_email == true){
            return 'Deleted';
        }
        else{
            return 'Not Delete';
        }

    }


    public function edit_phone_modal($phone_id)
    {
       $data = Phone::find($phone_id); 
       return view('admin_panel/contact/edit_phone_modal', compact('data'));
    }


    public function update_edit_phone(Request $request)
    {
        $id = $request->input('phone_id');
        $update = Phone::find($id);
        $update->phone = $request->phone;
        $update->save();
        Session::flash('update_edit_phone','Successfully Updated');
        return redirect()->action([ContactController::class , 'index']);
    }


    public function delete_edit_phone(Request $request)
    {
        $phone_id = $request->input('id');
        $delete_phone = Phone::find($phone_id);
        $delete_phone->delete();
 
        if($delete_phone == true){
            return 'Deleted';
        }
        else{
            return 'Not Delete';
        }
    }


    public function edit_address_modal($address_id)
    {
        $data = Address::find($address_id); 
        return view('admin_panel/contact/edit_address_modal', compact('data'));
    }


    public function update_edit_address(Request $request)
    {
        $id = $request->input('address_id');
        $update = Address::find($id);
        $update->address = $request->address;
        $update->save();
        Session::flash('update_edit_address','Successfully Updated');
        return redirect()->action([ContactController::class , 'index']);
    }


    public function delete_edit_address(Request $request)
    {
        $address_id = $request->input('id');
        $delete_address = Address::find($address_id);
        $delete_address->delete();
 
        if($delete_address == true){
            return 'Deleted';
        }
        else{
            return 'Not Delete';
        }
    }

}
