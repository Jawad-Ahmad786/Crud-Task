<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function show_users(){
        $users = User::all();
        return view('users-list', get_defined_vars());
    }

    public function create_user_form(){
        return view('add-user');
    }

    public function create_user(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'image'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasfile('image'))
        {
          $file = $request->file('image');
          $ext = $request->file('image')->getClientOriginalExtension();
          $filename = time(). "." .$ext;
          $file->move('uploads/', $filename);
          $user->image = $filename;
          
       }
        $user->save();
        return redirect('/')->with('success', 'User Added Successfully');
    }

    public function edit_user($id){
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    public function update_user(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasfile('image')){
            $path = 'uploads/'.$user->image;
            if(File::exists($path)){
              File::delete($path);
            }
              $file = $request->file('image');
              $ext = $request->file('image')->getClientOriginalExtension();
              $filename = time(). "." .$ext;
              $file->move('uploads/', $filename);
              $user->image = $filename;    
            }
        $user->update();
        return redirect('/')->with('success', 'User Updated Successfully');

    }
    
    public function delete_user($id){
        $user = User::find($id);
        if($user->image){
            $path = 'uploads/'.$user->image;
            if(File::exists($path)){
              File::delete($path);
            }
          }
          $user->delete();
        return redirect('/')->with('success', 'User Deleted Successfully');
    }
}
