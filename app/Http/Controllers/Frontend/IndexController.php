<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::with('subcategories','subsubcategories')->get();
        $sliders = Slider::where('slider_status', 1)->orderBy('id', 'desc')->get();
        $slidercates = Category::with('products')->orderBy('id','desc')->limit(3)->get();
        $items = array();
        foreach($slidercates as $findid) {
        $items[] = $findid->id;
        }
        $props = Product::orderBy('id','desc')->limit(8)->get();
        //return $props;
    	return view('frontend.index', compact('categories', 'sliders' ,'slidercates', 'props', 'items'));
    }
    public function details($id){
        $product = Product::with('multiImgs')->find($id)->first();
        $related = Product::where('subcategory_id', $product->subcategory_id)->where('id', '!=', $id)->get();
        return view('frontend.product-details', compact('product', 'related'));

    }
}
