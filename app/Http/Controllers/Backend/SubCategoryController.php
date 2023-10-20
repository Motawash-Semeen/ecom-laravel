<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function show()
    {
        $subcategories = SubCategory::with('category')->get();
        $categories = Category::all();
        return view('admin.subcategory.subcategory_view', compact('subcategories', 'categories'));
    }
    public function store(Request $request)
    {

    $request->validate(
        [
            'category_id' => 'required',
            'subcategory_name' => 'required',
            'subcategory_name_bn' => 'required',
        ],
        [
            'category_id.required' => 'Select Category',
            'subcategory_name.required' => 'Input Category Name',
            'subcategory_name_bn.required' => 'Input Category Name in Bangla',
            
        ]
    );
        //return $request->all();
        if(isset($request->id)){
            $id = $request->id;
            $subcategory =  SubCategory::find($id);
        }
        else{
            $subcategory = new SubCategory();
        }
        // $brand = new Brand();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_name_bn = $request->subcategory_name_bn;
        $subcategory->subcategory_slug = strtolower(str_replace(' ', '-', $request->subcategory_name));
        $subcategory->subcategory_slug_bn = strtolower(str_replace(' ', '-', $request->subcategory_name_bn));
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        $notification = array(
            'message' => 'SubCategory Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/subCategory')->with($notification);
    }

    public function delete($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        $subsub_category = SubSubCategory::where('category_id', $id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $subcategory_edit = SubCategory::find($id);
        return view('admin.subcategory.subcategory_view', compact('subcategory_edit','subcategories', 'categories'));
    }
}
