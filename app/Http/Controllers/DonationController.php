<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\DonationDes;

class DonationController extends Controller
{
   
    public function index()
    {
        $data = DonationDes::all();
        return view('admin_panel/donation_des/view_donation', compact('data'));
    }

   
    public function donation_form()
    {
        return view('admin_panel/donation_des/donation_form');
    }

   
    public function add_donation_des(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'des'    => 'required|string'
        ]);
        $insert_donation = new DonationDes();
        $insert_donation->donation_title = $request->title;
        $insert_donation->donation_des   = $request->des;
        $insert_donation->save();
        Session::flash('add_donation','Successfully Added');
        return redirect()->action([DonationController::class , 'index']);
    }

    public function edit_donation_des($donation_des_id)
    {
        $data = DonationDes::find($donation_des_id);
        return view('admin_panel/donation_des/edit_donation_des_modal',compact('data'));
    }


    public function update_donation_des(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'des'    => 'required|string'
        ]);
        $donation_id = $request->input('donation_des_id');
        $update_donation_des = DonationDes::find($donation_id);
        $update_donation_des->donation_title = $request->title;
        $update_donation_des->donation_des   = $request->des;
        $update_donation_des->save();
        
        Session::flash('update_donation','Successfully Updated');
        return redirect()->action([DonationController::class , 'index']);
    }
   
  
    public function delete_donation_des(Request $request)
    {
        $donation_id = $request->input('id');
        $delete_donation_des = DonationDes::find($donation_id);
        $delete_donation_des->delete();

        if($delete_donation_des == true){
            return 'Deleted';
         }
         else{
            return 'Not Delete';
         }
    }
}
