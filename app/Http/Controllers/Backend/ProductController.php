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

class ProductController extends Controller
{
    public function show()
    {
        return view('backend.layouts.product.show');
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
        $request->validate([
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

    $product = new Product();
    
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

    if($request->hasFile('product_thambnail')){
        $image = $request->file('product_thambnail');
        $reImage = time().'-product-img.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/products/'), $reImage);
        $product->product_thambnail = $reImage;
    }

    $product->save();

    if($request->hasFile('file')){
        $images = $request->file('file');
        foreach($images as $image){
            $reImage = time().'-product-secondary.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/products/'), $reImage);
            $multiImg = new MultiImg();
            $multiImg->product_id = $product->id;
            $multiImg->photo_name = $reImage;
            $multiImg->save();

        }
    }

    $notification = array(
        'message' => 'Product Inserted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('admin.product')->with($notification);

    }
}
