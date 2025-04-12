<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
class HomePageController extends Controller
{
    public function SelectVideo(){
        $result=HomePage::select('vidoe_description','video_url')->get();
        return response()->json([
            'result'=>$result
        ],200);
    }

    public function SelectTotalHome(){
        $result=HomePage::select('project_completed','happy_clients','support')->get();
        return response()->json([
            'result'=>$result
        ],200);
    }

    public function SelectTechHome(){
        $result=HomePage::select('tech_description')->get();
        return response()->json([
            'result'=>$result
        ],200);
    }

    public function SelectHomeTitle(){
        $result=HomePage::select('home_page_title','home_page_description')->get();
        return response()->json([
            'result'=>$result
        ],200);
    }

}
