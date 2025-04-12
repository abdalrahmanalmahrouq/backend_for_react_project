<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
class InformationController extends Controller
{
    public function AllInformationData(){
        $result=Information::all();
        return response()->json([
            'information'=>$result
        ],200);
    }
}
