<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Cabon\Carbon;
class ContactController extends Controller
{
    public function addContactinfo(Request $request)
    {
        $data=Contact::insert(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'massage'=>$request->massage,
                'created_at'=>now(),
            ]
            );
            if($data==true){
                return 1;
            }
            else{
                return 0;
            }
     }
}
