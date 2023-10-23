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
        $hotdeals = Product::where('hot_deals',1)->where('status',1)->where('discount_price', '!=', null)->orderBy('id','desc')->limit(4)->get();
        $specialdeals = Product::where('special_deals',1)->where('status',1)->orderBy('id','desc')->limit(4)->get();
        $offers = Product::where('special_offer',1)->where('status',1)->orderBy('id','desc')->limit(4)->get();
        $featured = Product::where('featured',1)->where('status',1)->orderBy('id','desc')->limit(6)->get();
        $items = array();
        $firstcate = Category::orderBy('id','asc')->first();
        $firstcateproducts = Product::where('category_id',$firstcate->id)->where('status',1)->get();
        

        $products = Product::all();

        $allTagsen = $products->flatMap(function ($product) {
            return explode(',', $product->product_tags_en);
        })->unique()->take(10);
        $allTagsbn = $products->flatMap(function ($product) {
            return explode(',', $product->product_tags_bn);
        })->unique()->take(10);

        foreach($slidercates as $findid) {
        $items[] = $findid->id;
        }
        $props = Product::orderBy('id','desc')->where('status',1)->limit(8)->get();
        //return $props;
    	return view('frontend.index', compact('categories', 'sliders' ,'slidercates', 'props', 'items','hotdeals','offers','featured','specialdeals','firstcateproducts','firstcate','allTagsen','allTagsbn'));
    }
    public function details($id){
        $product = Product::with('multiImgs')->find($id)->first();
        $products = Product::orderBy('id','desc')->get();
        $related = Product::where('subcategory_id', $product->subcategory_id)->where('id', '!=', $id)->get();
        return view('frontend.product-details', compact('product', 'related','products'));

    }
}
