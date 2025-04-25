<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class AdminUserCotroller extends Controller
{
   public function AdminLogout(){
    Auth::logout();
    return Redirect()->route('login');

   }


   public function UserProfileInformation(){
    $id=Auth::user()->id;
    $user=User::find($id);
    return view('backend.user.user_profile',compact('user'));
   

   }

   public function UserProfileInformationEdit(){
    $id=Auth::user()->id;
    $user=User::find($id);
    return view('backend.user.user_profile_edit',compact('user'));
   }

   public function UserProfileStore(Request $request){
    $data=User::find(Auth::user()->id );
    $data->name=$request->name;
    $data->email=$request->email;

    if($request->file('profile_photo_path')){
        $file=$request->file('profile_photo_path');
        @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images'),$filename);
        $data['profile_photo_path']=$filename;
    }
    $data->save();
    $notification=array(
        'message' => "User Profile Updated Successfully",
        'alert-type' =>"success"
    );
    return Redirect()->route('user.profile')->with($notification);
   }
}
