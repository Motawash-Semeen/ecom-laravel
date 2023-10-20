<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function show()
    {
        $products = Product::with('multiImgs')->orderBy('id', 'desc')->get();
        return view('admin.product.manage_product', compact('products'));
    }
    public function create()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = SubCategory::orderBy('id', 'desc')->get();
        $subsubcategories = SubSubCategory::orderBy('id', 'desc')->get();
        return view('admin.product.add_product', compact('brands', 'categories', 'subcategories', 'subsubcategories'));
    }
    public function store(Request $request)
    {
        if (isset($request->id)) {
            $validateData = Validator::make($request->all(),
                [
                    'brand_id' => 'required|integer',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'subsubcategory_id' => 'required',
                    'product_name_en' => 'required',
                    'product_name_bn' => 'required',
                    'product_code' => 'required',
                    'product_qty' => 'required',
                    'product_tags_en' => 'required',
                    'product_tags_bn' => 'required',
                    'product_color_en' => 'required',
                    'product_color_bn' => 'required',
                    'selling_price' => 'required',
                    'short_descp_bn' => 'required',
                    'long_descp_en' => 'required',
                    'long_descp_bn' => 'required',
                ],
                [
                    'brand_id.required' => 'Please Input Brand Name',
                    'category_id.required' => 'Please Input Category Name',
                    'subcategory_id.required' => 'Please Input SubCategory Name',
                    'subsubcategory_id.required' => 'Please Input Sub SubCategory Name',
                    'product_name_en.required' => 'Please Input Product Name in English',
                    'product_name_bn.required' => 'Please Input Product Name in Bangla',
                    'product_code.required' => 'Please Input Product Code',
                    'product_qty.required' => 'Please Input Product Quantity',
                    'product_tags_en.required' => 'Please Input Product Tags in English',
                    'product_tags_bn.required' => 'Please Input Product Tags in Bangla',
                    'product_color_en.required' => 'Please Input Product Color in English',
                    'product_color_bn.required' => 'Please Input Product Color in Bangla',
                    'selling_price.required' => 'Please Input Selling Price',
                    'short_descp_en.required' => 'Please Input Short Description in English',
                    'short_descp_bn.required' => 'Please Input Short Description in Bangla',
                    'long_descp_en.required' => 'Please Input Long Description in English',
                    'long_descp_bn.required' => 'Please Input Long Description in Bangla',

                ]
            );
        } 
        else {
            $validateData = Validator::make($request->all(),
                [
                    'brand_id' => 'required',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'subsubcategory_id' => 'required',
                    'product_name_en' => 'required',
                    'product_name_bn' => 'required',
                    'product_code' => 'required',
                    'product_qty' => 'required',
                    'product_tags_en' => 'required',
                    'product_tags_bn' => 'required',
                    'product_color_en' => 'required',
                    'product_color_bn' => 'required',
                    'selling_price' => 'required',
                    'product_thambnail' => 'required|mimes:jpg,jpeg,png',
                    'file' => 'required|array',
                    'file.*' => 'required|image|mimes:jpeg,png,jpg',
                    'short_descp_en' => 'required',
                    'short_descp_bn' => 'required',
                    'long_descp_en' => 'required',
                    'long_descp_bn' => 'required',
                ],
                [
                    'brand_id.required' => 'Please Input Brand Name',
                    'category_id.required' => 'Please Input Category Name',
                    'subcategory_id.required' => 'Please Input SubCategory Name',
                    'subsubcategory_id.required' => 'Please Input Sub SubCategory Name',
                    'product_name_en.required' => 'Please Input Product Name in English',
                    'product_name_bn.required' => 'Please Input Product Name in Bangla',
                    'product_code.required' => 'Please Input Product Code',
                    'product_qty.required' => 'Please Input Product Quantity',
                    'product_tags_en.required' => 'Please Input Product Tags in English',
                    'product_tags_bn.required' => 'Please Input Product Tags in Bangla',
                    'product_color_en.required' => 'Please Input Product Color in English',
                    'product_color_bn.required' => 'Please Input Product Color in Bangla',
                    'selling_price.required' => 'Please Input Selling Price',
                    'product_thambnail.required' => 'Please Input Product Thambnail',
                    'product_thambnail.mimes' => 'Please Input Product Thambnail in jpg,jpeg,png format',
                    'short_descp_en.required' => 'Please Input Short Description in English',
                    'short_descp_bn.required' => 'Please Input Short Description in Bangla',
                    'long_descp_en.required' => 'Please Input Long Description in English',
                    'long_descp_bn.required' => 'Please Input Long Description in Bangla',

                ]
            );
        }

        if($validateData->fails()){
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        if(isset($request->id)){
            $product = Product::find($request->id);
        }
        else{
            $product = new Product();
        }

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name_en = $request->product_name_en;
        $product->product_name_bn = $request->product_name_bn;
        $product->product_code = $request->product_code;
        $product->product_qty = $request->product_qty;
        $product->product_tags_en = $request->product_tags_en;
        $product->product_tags_bn = $request->product_tags_bn;
        $product->product_color_en = $request->product_color_en;
        $product->product_color_bn = $request->product_color_bn;
        $product->selling_price = $request->selling_price;
        $product->short_descp_en = $request->short_descp_en;
        $product->short_descp_bn = $request->short_descp_bn;
        $product->long_descp_en = $request->long_descp_en;
        $product->long_descp_bn = $request->long_descp_bn;
        isset($request->product_size_en) ? $product->product_size_en = $request->product_size_en : '';
        isset($request->product_size_bn) ? $product->product_size_bn = $request->product_size_bn : '';
        isset($request->discount_price) ? $product->discount_price = $request->discount_price : '';
        isset($request->hot_deals) ? $product->hot_deals = $request->hot_deals : '';
        isset($request->featured) ? $product->featured = $request->featured : '';
        isset($request->special_offer) ? $product->special_offer = $request->special_offer : '';
        isset($request->special_deals) ? $product->special_deals = $request->special_deals : '';
        $product->product_slug_en = strtolower(str_replace(' ', '-', $request->product_name_en));
        $product->product_slug_bn = strtolower(str_replace(' ', '-', $request->product_name_bn));

        if ($request->hasFile('product_thambnail')) {
            if($request->id){
                $image_path = public_path('upload/products/' . $product->product_thambnail);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->file('product_thambnail');
            $reImage = time() . '-product-img.' . $image->getClientOriginalExtension();
            $upload_path = 'upload/products/';
            $success = $image->move($upload_path, $reImage);

            // Check if the image was successfully uploaded
            if ($success) {
                // Resize the uploaded image to 300x300 pixels
                Image::make($upload_path . $reImage)
                    ->resize(917, 1000)
                    ->save($upload_path . $reImage);

                // Update the brand's image attribute
                $product->product_thambnail = $reImage;
            }
        }

        $product->save();

        if ($request->hasFile('file')) {
            $images = $request->file('file');
            foreach ($images as $image) {
                $reImage = time() . '-product-secondary.' . $image->getClientOriginalExtension();
                $upload_path = 'upload/products/';
                $success = $image->move($upload_path, $reImage);
                $multiImg = new MultiImg();
                $multiImg->product_id = $product->id;
                // Check if the image was successfully uploaded
                if ($success) {
                    // Resize the uploaded image to 300x300 pixels
                    Image::make($upload_path . $reImage)
                        ->resize(917, 1000)
                        ->save($upload_path . $reImage);

                    // Update the brand's image attribute
                    $multiImg->photo_name = $reImage;
                }
                $multiImg->save();
            }
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.product.manage')->with($notification);
    }
    public function edit($id)
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = SubCategory::orderBy('id', 'desc')->get();
        $subsubcategories = SubSubCategory::orderBy('id', 'desc')->get();
        $product = Product::with('multiImgs')->find($id);
        $multiImg = MultiImg::where('product_id', $id)->get();
        return view('admin.product.add_product', compact('brands', 'categories', 'subcategories', 'subsubcategories', 'product', 'multiImg'));
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $image_path = public_path('upload/products/' . $product->product_thambnail);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        $multiImg = MultiImg::where('product_id', $id)->get();
        foreach ($multiImg as $img) {
            $image_path = public_path('upload/products/' . $img->photo_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $img->delete();
        }
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/product/manage')->with($notification);
    }
    public function statusUpdate($id){
        $product = Product::find($id);
        if($product->status == 1){
            $product->status = 0;
            $product->save();
            $notification = array(
                'message' => 'Product Status Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $product->status = 1;
            $product->save();
            $notification = array(
                'message' => 'Product Status Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function multiImgUpdate(Request $request){
        //dd($request->all());
        if(isset($request->file))
        {
            $imgs = $request->file;
            foreach($imgs as $id => $img){
                $multiImg = MultiImg::find($id);
                $image_path = public_path('upload/products/' . $multiImg->photo_name);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $reImage = time() . '-product-secondary.' . $img->getClientOriginalExtension();
                $upload_path = 'upload/products/';
                $success = $img->move($upload_path, $reImage);
    
                // Check if the image was successfully uploaded
                if ($success) {
                    Image::make($upload_path . $reImage)
                        ->resize(917, 1000)
                        ->save($upload_path . $reImage);
    
                    MultiImg::where('id', $id)->update([
                        'photo_name' => $reImage,
                    ]);
                }
            }
        }
        
        if(isset($request->newFile)){
            $newImgs = $request->newFile;
            foreach($newImgs as $newImg){
                $reImage = time() . '-product-secondary.' . $newImg->getClientOriginalExtension();
                $upload_path = 'upload/products/';
                $success = $newImg->move($upload_path, $reImage);
                $multiImg = new MultiImg();
                $multiImg->product_id = $request->product_id;
                // Check if the image was successfully uploaded
                if ($success) {
                    // Resize the uploaded image to 300x300 pixels
                    Image::make($upload_path . $reImage)
                        ->resize(917, 1000)
                        ->save($upload_path . $reImage);

                    // Update the brand's image attribute
                    $multiImg->photo_name = $reImage;
                }
                $multiImg->save();
            }
        }
        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function multiImgDelete($id){
        $multiImg = MultiImg::find($id);
        $image_path = public_path('upload/products/' . $multiImg->photo_name);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $multiImg->delete();
        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
