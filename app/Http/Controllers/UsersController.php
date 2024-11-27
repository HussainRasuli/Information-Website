<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(3);
        return view('admin_panel/users/view_users', compact('users'));
    }

    
    public function account_form()
    {
        return view('admin_panel/users/users_form');
    }


    public function make_account(Request $request)
    {
        $validations = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:8',
            'confirm'       => 'required|same:password'
        ]);

        $make_account = new User();
        $make_account->name = $request->name;
        $make_account->email = $request->email;
        $make_account->type  = 'user';

        $path ='';
        if($request->file('photo'))
        {
            $path = Storage::disk('users')->putFile('/', new File($request->file('photo')));
        }

        $make_account->image = $path;

        $make_account->password = Hash::make($request->password);
        $make_account->save();

        Session::flash('created','Successfully Created.');
        return redirect()->action([UsersController::class , 'index']);
    }

   
    public function edit_account($id)
    {
        $data = User::find($id);
        return view('admin_panel/users/edit_user_modal', compact('data'));
    }

   
    public function update_user(Request $request)
    {
    
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

        Session::flash('update_account','Successfully Updated.');
        return redirect()->action([UsersController::class , 'index']);

    }

  
    public function delete_account(Request $request)
    {
        $id = $request->input('id');
        $user_delete = User::find($id);

        Storage::disk('users')->delete($user_delete->image);
        $user_delete->delete();

        if($user_delete == true)
        {
            return "Deleted";
        }
        else
        {
            return "Not Delete";
        }
    }
}
