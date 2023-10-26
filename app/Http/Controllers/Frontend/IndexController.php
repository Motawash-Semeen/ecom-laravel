<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $allTagsen;
    private $allTagsbn;
    private $color_bn;
    private $color_en;
    private $categories;
    public function __construct()
    {
        $this->categories = Category::with('subcategories','subsubcategories')->get();

        $products = Product::all();

        $this->allTagsen = $products->flatMap(function ($product) {
            return explode(',', $product->product_tags_en);
        })->unique()->take(10);

        $this->allTagsbn = $products->flatMap(function ($product) {
            return explode(',', $product->product_tags_bn);
        })->unique()->take(10);

        $this->color_en = $products->flatMap(function ($product) {
            return explode(',', $product->product_color_en);
        })->unique()->take(10);

        $this->color_bn = $products->flatMap(function ($product) {
            return explode(',', $product->product_color_bn);
        })->unique()->take(10);
        
    }
    public function index(){

        $categories = $this->categories;
        $sliders = Slider::where('slider_status', 1)->orderBy('id', 'desc')->get();
        $slidercates = Category::with('products')->orderBy('id','desc')->limit(3)->get();
        $hotdeals = Product::where('hot_deals',1)->where('status',1)->where('discount_price', '!=', null)->orderBy('id','desc')->limit(4)->get();
        $specialdeals = Product::where('special_deals',1)->where('status',1)->orderBy('id','desc')->limit(4)->get();
        $offers = Product::where('special_offer',1)->where('status',1)->orderBy('id','desc')->limit(4)->get();
        $featured = Product::where('featured',1)->where('status',1)->orderBy('id','desc')->limit(6)->get();
        $items = array();
        $firstcate = Category::orderBy('id','asc')->first();
        $firstcateproducts = Product::where('category_id',$firstcate->id)->where('status',1)->get();
        

        // $products = Product::all();

        // $allTagsen = $products->flatMap(function ($product) {
        //     return explode(',', $product->product_tags_en);
        // })->unique()->take(10);
        // $allTagsbn = $products->flatMap(function ($product) {
        //     return explode(',', $product->product_tags_bn);
        // })->unique()->take(10);
        $allTagsen = $this->allTagsen;
        $allTagsbn = $this->allTagsbn;

        foreach($slidercates as $findid) {
        $items[] = $findid->id;
        }
        $props = Product::orderBy('id','desc')->where('status',1)->limit(8)->get();
        //return $props;
    	return view('frontend.index', compact('categories', 'sliders' ,'slidercates', 'props', 'items','hotdeals','offers','featured','specialdeals','firstcateproducts','firstcate','allTagsen','allTagsbn'));
    }
    public function details($id,$slug){

        $oneproduct = Product::with('multiImgs','categories')->where('id', $id)->where('status',1)->first();
        $tags_en = explode(',', $oneproduct->product_tags_en);
        $tags_bn = explode(',', $oneproduct->product_tags_bn);
        //return $product;
        $hotdeals = Product::where('hot_deals',1)->where('status',1)->where('discount_price', '!=', null)->orderBy('id','desc')->limit(4)->get();
        $related = Product::where('subcategory_id', $oneproduct->subcategory_id)->where('id', '!=', $id)->where('status',1)->get();

        return view('frontend.product-details', compact('oneproduct', 'related','hotdeals','tags_en','tags_bn'));

    }
    public function show($id){
        $categories = $this->categories;
        $allTagsen = $this->allTagsen;
        $allTagsbn = $this->allTagsbn;

        $products = Product::where('subcategory_id', $id)->where('status',1)->orderBy('id','desc')->paginate(12);

        $color_en = $this->color_en;
        $color_bn = $this->color_bn;

        $brands = Brand::orderBy('id','asc')->get();
        return view('frontend.all_product', compact('categories','allTagsen','allTagsbn','products', 'color_en', 'color_bn','brands'));
    }
}
