<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    public function AllOnCourseHome(){
        $result=Course::limit(4)->get();
        return response()->json([
            'result'=>$result
        ],200);
    }

    public function AllCourses(){
        $result=Course::all();
        return response()->json([
            'result'=>$result
        ],200);
    }

    public function OnSelectCourse(Request $request){
        $id=$request->id;
        $result=Course::where('id',$id)->get();
        return response()->json([
            'result'=>$result
        ],200);
    }
}
