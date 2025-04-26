<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
class InformationController extends Controller
{
    public function AllInformationData(){
        $result=Information::all();
        return $result;
    }

    public function AllInformation(){
        $result=Information::all();
        return view('backend.information.all_information',compact('result'));
    }

    public function EditInformation(){
        $result=Information::all();
        return view('backend.information.edit_information',compact('result'));
    }

    public function AddInformation( ){
            return view('backend.information.add_information');
       
    }

    public function StoreInformation(Request $request){
        Information::insert([
            'about'=>$request->about,
            'terms'=>$request->terms,
            'policy'=>$request->policy,
            'privacy'=>$request->privacy,
            
        ]);
        $notification=array(
            'message' => "Information  Added Successfully",
            'alert-type' =>"success"
        );
        return Redirect()->route('all.information')->with($notification);
    }
}
