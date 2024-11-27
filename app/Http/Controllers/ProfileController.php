<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Auth;
class ProfileController extends Controller
{
    
    public function index()
    {
        $data = Auth::user();
        return view('admin_panel/profile/view_profile', compact('data'));
    }

    public function profile_form(Request $request, $id)
    {
        $data = User::find($id);
        return view('admin_panel/profile/profile_form', compact('data'));
    }


    public function update_profile(Request $request)
    {
        if($request->input('password')){

            $validations = $request->validate([
                'password'      => 'string|min:8',
                'confirm'       => 'same:password'
            ]);
        }
        
        
        $id = $request->input('user_id');

        $update = User::find($id);
        $update->name = $request->name;
        $path = $update->image;

        if($request->file('photo'))
        {   
            Storage::disk('users')->delete($update->image);
            $path = Storage::disk('users')->putFile('/', new File($request->file('photo')));
        }

        $update->image = $path;
    
        if($request->input('password'))
        {
            $pass = Hash::make($request->password);
            $update->password = $pass;
        }

        $update->save();

        Session::flash('update_profile','Successfully Updated.');
        return redirect()->action([ProfileController::class , 'index']);
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }
}
