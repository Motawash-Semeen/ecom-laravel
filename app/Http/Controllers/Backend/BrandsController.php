<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;
class BrandsController extends Controller
{
    public function show()
    {
        $brands = Brand::all();
        return view('admin.brands.brand_view', compact('brands'));
    }
    public function store(Request $request)
    {
if(!isset($request->id)) {
    $request->validate(
        [
            'brand_name' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required|mimes:png,jpg,jpeg',
        ],
        [
            'brand_name.required' => 'Input Brand Name',
            'brand_name_bn.required' => 'Input Brand Name in Bangla',
            'brand_image.required' => 'Please select an image',
            'brand_image.mimes' => 'Only PNG, JPG, JPEG are allowed',
        ]
    );
}
else{
    $request->validate(
        [
            'brand_name' => 'required',
            'brand_name_bn' => 'required',
        ],
        [
            'brand_name.required' => 'Input Brand Name',
            'brand_name_bn.required' => 'Input Brand Name in Bangla',
        ]
    );
}
        //return $request->all();
        if(isset($request->id)){
            $id = $request->id;
            $brand =  Brand::find($id);
        }
        else{
            $brand = new Brand();
        }
        // $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_name_bn = $request->brand_name_bn;
        $brand->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
        $brand->brand_slug_bn = strtolower(str_replace(' ', '-', $request->brand_name_bn));
        if ($request->hasFile('brand_image')) {
            if (isset($request->id)) {
                $brand = Brand::find($request->id); // Assuming you have a Brand model
        
                if ($brand) {
                    $image_path = 'upload/brands/' . $brand->brand_image;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
            }
        
            $image = $request->file('brand_image');
            $image_name = time() . '_brand_img'; // Updated image name format
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/brands/';
        
            // Use Laravel's file upload method to move and resize the image
            $success = $image->move($upload_path, $image_full_name);
        
            // Check if the image was successfully uploaded
            if ($success) {
                // Resize the uploaded image to 300x300 pixels
                Image::make($upload_path . $image_full_name)
                    ->resize(300, 300)
                    ->save($upload_path . $image_full_name);
        
                // Update the brand's image attribute
                $brand->brand_image = $image_full_name;
                $brand->save(); // Save the changes to the database
            }
        }
        
        $brand->save();
        $notification = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/brands')->with($notification);
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $image_path = 'upload/brands/' . $brand->brand_image;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
        $brand->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $brands = Brand::all();
        $brand_edit = Brand::find($id);
        return view('admin.brands.brand_view', compact('brand_edit','brands'));
    }
}
