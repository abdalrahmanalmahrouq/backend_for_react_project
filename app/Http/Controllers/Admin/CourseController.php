<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    public function AllOnCourseHome(){
        $result=Course::limit(4)->get();
        return $result;
    }

    public function AllCourses(){
        $result=Course::all();
        return $result;
    }

    public function OnSelectCourse($courseId){
        $id=$courseId;
        $result=Course::where('id',$id)->get();
        return $result;
    }
}
