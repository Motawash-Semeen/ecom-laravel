<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.profile', compact('adminData'));

    }
    public function AdminProfileUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $adminData = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        $adminData->name = $request->name;
        $adminData->email = $request->email;
        if($request->file('profile_photo_path')){
            if($adminData->profile_photo_path != null && file_exists(public_path('upload/profile/'.$adminData->profile_photo_path))){
                unlink(public_path('upload/profile/'.$adminData->profile_photo_path));
            }
            $file = $request->file('profile_photo_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'profile-image.'.$extension;
            $file->move('upload/profile/', $filename);
            $adminData->profile_photo_path = $filename;
        }
        $adminData->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminPasswordUpdate(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',

        ]);
        $hashedPassword = Auth::guard('admin')->user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            if(!Hash::check($request->new_password, $hashedPassword)){

                $admin = Admin::find(Auth::guard('admin')->user()->id);
                $admin->password = Hash::make($request->new_password);
                
                $admin->save();
                Auth::logout();
                $notification = array(
                    'message' => 'Password Updated Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.loginForm')->with($notification);

            }else{
                $notification = array(
                    'message' => 'New Password can not be the same as old password',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Old Password Does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
