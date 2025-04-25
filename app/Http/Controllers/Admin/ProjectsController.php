<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectsController extends Controller
{
    public function AllOnProjectHome()
    {
        $result = Project::limit(3)->get();
         return $result;
    }
    public function AllOnProjectAllData()
    {
        $result = Project::all();
         return $result;
    }
    public function OnSelectProject($projectId)
    {
        $id=$projectId;
        $result = Project::where('id',$id)->get();
         return $result;
    }
}
