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

        $ContactArray=json_decode($request->getContent(),true);

        $name=$ContactArray['name'];
        $email=$ContactArray['email'];
        $massage=$ContactArray['massage'];
        

        $data=Contact::insert(
            [
                'name'=>$name,
                'email'=>$email,
                'massage'=>$massage,
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
