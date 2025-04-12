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
        return response()->json([
            'project' => $result
        ], 200);
    }
    public function AllOnProjectAllData()
    {
        $result = Project::all();
        return response()->json([
            'project' => $result
        ], 200);
    }
    public function OnSelectProject(Request $request)
    {
        $result = Project::where('id', $request->id)->get();
        return response()->json([
            'project' => $result
        ], 200);
    }
}
