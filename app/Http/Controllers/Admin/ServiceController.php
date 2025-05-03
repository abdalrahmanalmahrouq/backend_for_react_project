<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Intervention\Image\ImageManager;  // Make sure this is at the top
use Carbon\Carbon;
class ServiceController extends Controller
{
   public function AllServicesData(){
        $result=Services::all();
        return $result;
    }

    public function AllServices(){
        $services=Services::all();
        return view('backend.services.all_services',compact('services'));
    }

    public function AddServices( ){
            $services=Services::all();
            return view('backend.services.add_services',compact('services'));
        
    }

    public function StoreService(Request $request)
    {
        // Validate the request
        $request->validate([
            'service_name' => 'required',
            'service_logo' => 'required|image',
            'service_description' => 'required',
        ]);
    
        // Get the image file
        $image = $request->file('service_logo');
        // Generate unique name
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // Create directory if needed
        $storage_path = public_path('upload/services');
        if (!file_exists($storage_path)) {
            mkdir($storage_path, 0777, true);
        }
        // Process and save image
        $relative_path = 'upload/services/' . $name_gen;
        $full_storage_path = public_path($relative_path);
        // Using Intervention Image
        $manager = new \Intervention\Image\ImageManager(
            new \Intervention\Image\Drivers\Gd\Driver()
        );  
        $manager->read($image)
                ->resize(512, 512)
                ->save($full_storage_path);
        // Construct the URL for database storage
        $base_url = 'http://127.0.0.1:8000/';
        $save_url = $base_url . $relative_path;
            
        // Save to database
        Services::insert([
            'service_name' => $request->service_name,
            'service_logo' => $save_url,  // Store the full URL
            'service_description' => $request->service_description,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('all.services')->with([
            'message' => 'Service Inserted Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function EditService($id){
        $service=Services::findorfail($id);
        return view('backend.services.edit_service',compact('service'));
    }

    public function UpdateService(Request $request,$id){
        $service=Services::findorfail($id);

        if($request->file('service_logo')){
          
            // Get the image file
            $image = $request->file('service_logo');
            // Generate unique name
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // Create directory if needed
            $storage_path = public_path('upload/services');
            if (!file_exists($storage_path)) {
                mkdir($storage_path, 0777, true);
            }
            // Process and save image
            $relative_path = 'upload/services/' . $name_gen;
            $full_storage_path = public_path($relative_path);       
            // Using Intervention Image
            $manager = new \Intervention\Image\ImageManager(
                new \Intervention\Image\Drivers\Gd\Driver()
            );     
            $manager->read($image)
                    ->resize(512, 512)
                    ->save($full_storage_path);
            // Construct the URL for database storage
            $base_url = 'http://127.0.0.1:8000/';
            $save_url = $base_url . $relative_path;

            // Save to database
            Services::findorfail($id)->update([
                'service_name' => $request->service_name,
                'service_logo' => $save_url,  // Store the full URL
                'service_description' => $request->service_description,
                'created_at' => Carbon::now(),
            ]);
    
            return redirect()->route('all.services')->with([
                'message' => 'Service updated Successfully',
                'alert-type' => 'success',
            ]);
        } else{
            Services::findorfail($id)->update([
                'service_name' => $request->service_name,
                'service_description' => $request->service_description,
                'created_at' => Carbon::now(),
            ]);
    
            return redirect()->route('all.services')->with([
                'message' => 'Service updated Successfully without image',
                'alert-type' => 'success',
            ]);
        }
    }

    public function DeleteService($id){
        Services::findorfail($id)->delete();
        $notification=array(
            'message' => "Service  Deleted Successfully",
            'alert-type' =>"success"
        );
        return Redirect()->back()->with($notification);
    }
}
