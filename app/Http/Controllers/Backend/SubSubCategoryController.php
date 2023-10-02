<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function show()
    {
        $subsubcategories = SubSubCategory::with('category', 'subcategory')->get();
        //return $subsubcategories;
        $subcategories = SubCategory::with('category')->get();
        $categories = Category::all();
        return view('admin.subsubcategory.subsubcategory_view', compact('subcategories', 'categories', 'subsubcategories'));
    }
    public function store(Request $request)
    {

    $request->validate(
        [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
            'subsubcategory_name_bn' => 'required',
        ],
        [
            'category_id.required' => 'Select Category',
            'subcategory_id.required' => 'Select Sub Category',
            'subsubcategory_name.required' => 'Input Sub SubCategory Name',
            'subsubcategory_name_bn.required' => 'Input Sub SubCategory Name in Bangla',
            
        ]
    );
        //return $request->all();
        if(isset($request->id)){
            $id = $request->id;
            $subsubcategory =  SubSubCategory::find($id);
        }
        else{
            $subsubcategory = new SubSubCategory();
        }
        // $brand = new Brand();
        $subsubcategory->subsubcategory_name = $request->subsubcategory_name;
        $subsubcategory->subsubcategory_name_bn = $request->subsubcategory_name_bn;
        $subsubcategory->subsubcategory_slug = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
        $subsubcategory->subsubcategory_slug_bn = strtolower(str_replace(' ', '-', $request->subsubcategory_name_bn));
        $subsubcategory->category_id = $request->category_id;
        $subsubcategory->subcategory_id = $request->subcategory_id;
        $subsubcategory->save();
        $notification = array(
            'message' => 'Sub SubCategory Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/subSubCategory')->with($notification);
    }

    public function delete($id)
    {
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->delete();
        $notification = array(
            'message' => 'Sub SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $subsubcategories = SubSubCategory::all();
        $subsubcategory_edit = SubSubCategory::find($id);
        return view('admin.subsubcategory.subsubcategory_view', compact('subsubcategory_edit','subcategories', 'categories','subsubcategories'));
    }
    public function getSubcategories(Request $request)
{
    $category_id = $request->input('category_id');

    // Query the database to fetch subcategories based on the selected category
    $subcategories = SubCategory::where('category_id', $category_id)->get();

    return response()->json(['subcategories' => $subcategories]);
}
public function getSubSubcategories(Request $request)
    {
        $subcategory_id = $request->input('subcategory_id');

        // Query the database to fetch subsubcategories based on the selected subcategory
        $subsubcategories = SubSubCategory::where('subcategory_id', $subcategory_id)->get();

        return response()->json(['subsubcategories' => $subsubcategories]);
    }
}
