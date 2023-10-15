<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function show()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.sliders.manage_sliders', compact('sliders'));
    }
    // public function create()
    // {
    //     return view('admin.sliders.add_slider');
    // }
    public function store(Request $request)
    {

    $request->validate(
        [
            'slider_img' => 'required|mimes:png,jpg,jpeg',
        ],
        [
            'slider_img.required' => 'Please select an image',
            'slider_img.mimes' => 'Only PNG, JPG, JPEG are allowed',
        ]
    );

        //return $request->all();
        if(isset($request->id)){
            $id = $request->id;
            $Slider =  Slider::find($id);
        }
        else{
            $Slider = new Slider();
        }
        // $Slider = new Slider();
        $request->slider_title ? $Slider->slider_title = $request->slider_title : '';
        $request->slider_description ? $Slider->slider_description = $request->slider_description : '';
        if ($request->hasFile('slider_img')) {
            if (isset($request->id)) {
                $Slider = Slider::find($request->id); // Assuming you have a Slider model
        
                if ($Slider) {
                    $image_path = 'upload/Sliders/' . $Slider->slider_img;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
            }
        
            $image = $request->file('slider_img');
            $image_name = time() . '_Slider_img'; // Updated image name format
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/sliders/';
        
            // Use Laravel's file upload method to move and resize the image
            $success = $image->move($upload_path, $image_full_name);
        
            // Check if the image was successfully uploaded
            if ($success) {
                // Resize the uploaded image to 300x300 pixels
                Image::make($upload_path . $image_full_name)
                    ->resize(870, 370)
                    ->save($upload_path . $image_full_name);
        
                // Update the Slider's image attribute
                $Slider->slider_img = $image_full_name;
                $Slider->save(); // Save the changes to the database
            }
        }
        
        $Slider->save();
        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/slider')->with($notification);
    }

    public function delete($id)
    {
        $Slider = Slider::find($id);
        $image_path = 'upload/sliders/' . $Slider->slider_img;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
        $Slider->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $sliders = Slider::all();
        $slider_edit = Slider::find($id);
        return view('admin.sliders.manage_sliders', compact('slider_edit','sliders'));
    }
    public function status($id)
    {
        $slider = Slider::find($id);
        if ($slider->slider_status == 1) {
            $slider->slider_status = 0;
        } else {
            $slider->slider_status = 1;
        }
        $slider->save();
        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
