<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('admin.category.category_view', compact('categories'));
    }
    public function store(Request $request)
    {

    $request->validate(
        [
            'category_name' => 'required',
            'category_name_bn' => 'required',
        ],
        [
            'category_name.required' => 'Input Category Name',
            'category_name_bn.required' => 'Input Category Name in Bangla',
            
        ]
    );
        //return $request->all();
        if(isset($request->id)){
            $id = $request->id;
            $category =  Category::find($id);
        }
        else{
            $category = new Category();
        }
        // $brand = new Brand();
        $category->category_name = $request->category_name;
        $category->category_name_bn = $request->category_name_bn;
        $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
        $category->category_slug = strtolower(str_replace("'", '', $category->category_slug));
        $category->category_slug_bn = strtolower(str_replace(' ', '-', $request->category_name_bn));
        $category->category_slug_bn = strtolower(str_replace("'", '', $category->category_slug_bn));
        $category->category_icon = $request->category_icon;
        $category->save();
        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/category')->with($notification);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        $sub_category = SubCategory::where('category_id', $id)->delete();
        $subsub_category = SubSubCategory::where('category_id', $id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $categories = Category::all();
        $category_edit = Category::find($id);
        return view('admin.category.category_view', compact('category_edit','categories'));
    }
}
