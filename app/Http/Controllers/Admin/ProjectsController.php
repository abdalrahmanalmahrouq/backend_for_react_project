<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Intervention\Image\ImageManager;  // Make sure this is at the top
use Carbon\Carbon;
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

    public function AllProjects(){
        $projects = Project::all();
        return view('backend.projects.all_projects',compact('projects'));
    }

    public function AddProject(){
        $projects = Project::all();
        return view('backend.projects.add_projects',compact('projects'));
    }

    public function StoreProject(Request $request){
        
            // Validate the request
            $request->validate([
                'project_name' => 'required',
                'img_one' => 'required|image',
                'project_description' => 'required',
            ]);
        
            // Get the image file
            $image1 = $request->file('img_one');
            $image2 = $request->file('img_two');
            // Generate unique name
            $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            // Create directory if needed
            $storage_path = public_path('upload/projects');
            if (!file_exists($storage_path)) {
                mkdir($storage_path, 0777, true);
            }
            // Process and save image
            $relative_path1 = 'upload/projects/' . $name_gen1;
            $relative_path2 = 'upload/projects/' . $name_gen2;
            $full_storage_path1 = public_path($relative_path1);
            $full_storage_path2 = public_path($relative_path2);
            // Using Intervention Image
            $manager = new \Intervention\Image\ImageManager(
                new \Intervention\Image\Drivers\Gd\Driver()
            ); 

            $manager->read($image1)
                    ->resize(512, 512)
                    ->save($full_storage_path1);
            
            $manager->read($image2)
                    ->resize(512, 512)
                    ->save($full_storage_path2);

            // Construct the URL for database storage
            $base_url = 'http://127.0.0.1:8000/';
            $save_url1 = $base_url . $relative_path1;
            $save_url2 = $base_url . $relative_path2;
                
            // Save to database
            Project::insert([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'prject_features' => $request->project_features,
                'live_preview' => $request->live_preview,
                'img_one' => $save_url1,  // Store the full URL
                'img_two' => $save_url2,  // Store the full URL 
                'created_at' => Carbon::now(),
            ]);
    
            return redirect()->route('all.projects')->with([
                'message' => 'project Inserted Successfully',
                'alert-type' => 'success',
            ]);
        
    }

    public function EditProject($id){
        $projects = Project::findOrFail($id);
        return view('backend.projects.edit_projects',compact('projects'));
    }


    public function UpdateProject(Request $request,$id){
        $project=Project::findOrFail($id);

        if($request->file('img_one') && $request->file('img_two')){
              // Validate the request
              $request->validate([
                'project_name' => 'required',
                'img_one' => 'required|image',
                'project_description' => 'required',
            ]);
        
            // Get the image file
            $image1 = $request->file('img_one');
            $image2 = $request->file('img_two');
            // Generate unique name
            $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            // Create directory if needed
            $storage_path = public_path('upload/projects');
            if (!file_exists($storage_path)) {
                mkdir($storage_path, 0777, true);
            }
            // Process and save image
            $relative_path1 = 'upload/projects/' . $name_gen1;
            $relative_path2 = 'upload/projects/' . $name_gen2;
            $full_storage_path1 = public_path($relative_path1);
            $full_storage_path2 = public_path($relative_path2);
            // Using Intervention Image
            $manager = new \Intervention\Image\ImageManager(
                new \Intervention\Image\Drivers\Gd\Driver()
            ); 

            $manager->read($image1)
                    ->resize(512, 512)
                    ->save($full_storage_path1);
            
            $manager->read($image2)
                    ->resize(512, 512)
                    ->save($full_storage_path2);

            // Construct the URL for database storage
            $base_url = 'http://127.0.0.1:8000/';
            $save_url1 = $base_url . $relative_path1;
            $save_url2 = $base_url . $relative_path2;
                
            // Save to database
            Project::findorfail($id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'prject_features' => $request->project_features,
                'live_preview' => $request->live_preview,
                'img_one' => $save_url1,  // Store the full URL
                'img_two' => $save_url2,  // Store the full URL 
                'created_at' => Carbon::now(),
            ]);
    
            return redirect()->route('all.projects')->with([
                'message' => 'project updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{
            // Validate the request
            $request->validate([
                'project_name' => 'required',
                'project_description' => 'required',
            ]);
        
            // Save to database
            Project::findorfail($id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'prject_features' => $request->project_features,
                'live_preview' => $request->live_preview,
                'created_at' => Carbon::now(),
            ]);
    
            return redirect()->route('all.projects')->with([
                'message' => 'project updated Successfully without images',
                'alert-type' => 'success',
            ]);
        }
    }

    public function DeleteProject($id){
        $project=Project::findOrFail($id);
        $project->delete();
        return redirect()->back()->with([
            'message' => 'Project deleted Successfully',
            'alert-type' => 'success',
        ]);
    }
}
