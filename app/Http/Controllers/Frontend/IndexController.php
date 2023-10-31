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
    // public function show($id){
    //     $categories = $this->categories;
    //     $allTagsen = $this->allTagsen;
    //     $allTagsbn = $this->allTagsbn;

    //     $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
    //     $min = isset($_GET['min']) ? $_GET['min'] :'';
    //     $max = isset($_GET['max']) ? $_GET['max'] :'';
        

    //     if(isset($_GET['sort'])){
    //         $sort = $_GET['sort'];
    //         if($sort == 'price_asc'){
    //             if(isset($_GET['max'])){
    //                 $products = Product::whereBetween('selling_price', [$min, $max])->where('subcategory_id', $id)->where('status',1)->orderBy('selling_price','asc')->paginate($limit);
    //             }
    //             else{
    //               $products = Product::where('subcategory_id', $id)->where('status',1)->orderBy('selling_price','asc')->paginate($limit);  
    //             }
                
    //         }
    //         if($sort == 'price_desc'){
    //             if(isset($_GET['max'])){
    //                 $products = $products = Product::whereBetween('selling_price', [$min, $max])->where('subcategory_id', $id)->where('status',1)->orderBy('selling_price','desc')->paginate($limit);
    //             }
    //             else{
    //                 $products = Product::where('subcategory_id', $id)->where('status',1)->orderBy('selling_price','desc')->paginate($limit);  
    //             }
                
    //         }
    //         if($sort == 'name_asc'){
    //             if(isset($_GET['max'])){
    //                 $products = $products = Product::whereBetween('selling_price', [$min, $max])->where('subcategory_id', $id)->where('status',1)->orderBy('product_name_en','asc')->paginate($limit);
    //             }
    //             else{
    //                 $products = Product::where('subcategory_id', $id)->where('status',1)->orderBy('product_name_en','asc')->paginate($limit);
    //             }
                
    //         }
    //         if($sort == 'name_desc'){
    //             if(isset($_GET['max'])){
    //                 $products = $products = Product::whereBetween('selling_price', [$min, $max])->where('subcategory_id', $id)->where('status',1)->orderBy('product_name_en','desc')->paginate($limit);
    //             }
    //             else{
    //                 $products = Product::where('subcategory_id', $id)->where('status',1)->orderBy('product_name_en','desc')->paginate($limit);
    //             }
                
    //         }
    //     }
    //     else{
    //         $sort = '';
    //         if(isset($_GET['max'])){
                
    //             $products = $products = Product::whereBetween('selling_price', [$min, $max])->where('subcategory_id', $id)->where('status',1)->orderBy('id','desc')->paginate($limit);
                
    //         }
    //         else{
    //             $products = Product::where('subcategory_id', $id)->where('status',1)->orderBy('id','desc')->paginate($limit);
    //         }
            
            
    //     }
    //     if(isset($_GET['max'])){
                
    //         $limit_max= $_GET['max'];
            
    //     }
    //     if(isset($_GET['min'])){
                
    //         $limit_min= $_GET['min'];
            
    //     }
        
    //     $max= Product::where('subcategory_id', $id)->where('status',1)->max('selling_price');
        
    //     $limit_min = isset($_GET['min']) ? $_GET['min'] :0;
    //     $limit_max = isset($_GET['max']) ? $_GET['max'] :$max;

    //     $color_en = $this->color_en;
    //     $color_bn = $this->color_bn;

    //     $brands = Brand::orderBy('id','asc')->get();
    //     return view('frontend.all_product', compact('categories','allTagsen','allTagsbn','products', 'color_en', 'color_bn','brands','limit','sort','max','limit_max','limit_min'));
    // }
    public function show($id, $cate_slug = null, $subcate_slug = null, $subsubcate_slug = null){
        $categories = $this->categories;
        $allTagsen = $this->allTagsen;
        $allTagsbn = $this->allTagsbn;

        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        $min = isset($_GET['min']) ? $_GET['min'] :'';
        $max = isset($_GET['max']) ? $_GET['max'] :'';
        
        $query = Product::where('status', 1);

        if($subsubcate_slug != null && $subcate_slug != null && $cate_slug != null){
            $query = $query->where('subsubcategory_id', $id);
        }
        else if($subcate_slug != null && $subsubcate_slug == null && $cate_slug != null){
            if($cate_slug == 'brands'){
                $query = $query->where('brand_id', $id);
            }
            else{
                $query = $query->where('subcategory_id', $id);
            }
            
        }
        else if($cate_slug != null && $subcate_slug == null && $subsubcate_slug == null){
            $query = $query->where('category_id', $id);
        }

        if (isset($_GET['max']) && isset($_GET['min'])) {
            $query = $query->whereBetween('selling_price', [$min, $max]);
        }
    
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            switch ($sort) {
                case 'price_asc':
                    $query = $query->orderBy('selling_price', 'asc');
                    break;
                case 'price_desc':
                    $query = $query->orderBy('selling_price', 'desc');
                    break;
                case 'name_asc':
                    $query = $query->orderBy('product_name_en', 'asc');
                    break;
                case 'name_desc':
                    $query = $query->orderBy('product_name_en', 'desc');
                    break;
                // Add more cases for different types of sorting
                default:
                    // Default case if the sorting type is not matched
                    break;
            }
        } else {
            $sort = '';
            $query = $query->orderBy('id', 'desc');
        }
        if(isset($_GET['max'])){
                
            $limit_max= $_GET['max'];
            
        }
        if(isset($_GET['min'])){
                
            $limit_min= $_GET['min'];
            
        }
        $products = $query->paginate($limit);
        
        //$max= Product::where('subcategory_id', $id)->where('status',1)->max('selling_price');

        $max_query = Product::where('status', 1);

        if($subsubcate_slug != null && $subcate_slug != null && $cate_slug != null){
            $max_query = $max_query->where('subsubcategory_id', $id)->max('selling_price');
        }
        else if($subcate_slug != null && $subsubcate_slug == null && $cate_slug != null){
            if($cate_slug == 'brands'){
                $max_query = $max_query->where('brand_id', $id)->max('selling_price');
            }
            else{
                $max_query = $max_query->where('subcategory_id', $id)->max('selling_price');
            }
            
        }
        else if($cate_slug != null && $subcate_slug == null && $subsubcate_slug == null){
            $max_query = $max_query->where('category_id', $id)->max('selling_price');
        }
        $max= $max_query;

        $limit_min = isset($_GET['min']) ? $_GET['min'] :0;
        $limit_max = isset($_GET['max']) ? $_GET['max'] :$max;

        $color_en = $this->color_en;
        $color_bn = $this->color_bn;

        $brands = Brand::orderBy('id','asc')->get();
        return view('frontend.all_product', compact('categories','allTagsen','allTagsbn','products', 'color_en', 'color_bn','brands','limit','sort','max','limit_max','limit_min'));
    }

    public function showByTag($by, $name){
        $categories = $this->categories;
        $allTagsen = $this->allTagsen;
        $allTagsbn = $this->allTagsbn;

        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        $min = isset($_GET['min']) ? $_GET['min'] :'';
        $max = isset($_GET['max']) ? $_GET['max'] :'';
        if($by == 'tag'){
            $query = Product::where('product_tags_en', 'like', '%' . $name . '%')->where('status', 1);
        }
        else if($by == 'color'){
            $query = Product::where('product_color_en', 'like', '%' . $name . '%')->where('status', 1);
        }
        
        if (isset($_GET['max']) && isset($_GET['min'])) {
            $query = $query->whereBetween('selling_price', [$min, $max]);
        }
    
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            switch ($sort) {
                case 'price_asc':
                    $query = $query->orderBy('selling_price', 'asc');
                    break;
                case 'price_desc':
                    $query = $query->orderBy('selling_price', 'desc');
                    break;
                case 'name_asc':
                    $query = $query->orderBy('product_name_en', 'asc');
                    break;
                case 'name_desc':
                    $query = $query->orderBy('product_name_en', 'desc');
                    break;
                // Add more cases for different types of sorting
                default:
                    // Default case if the sorting type is not matched
                    break;
            }
        } else {
            $sort = '';
            $query = $query->orderBy('id', 'desc');
        }
        if(isset($_GET['max'])){
                
            $limit_max= $_GET['max'];
            
        }
        if(isset($_GET['min'])){
                
            $limit_min= $_GET['min'];
            
        }
        $products = $query->paginate($limit);
        
        //$max= Product::where('subcategory_id', $id)->where('status',1)->max('selling_price');

        
        if ($by == 'tag') {
            $max = Product::where('product_tags_en', 'like', '%' . $name . '%')->where('status', 1)->max(\DB::raw('CAST(selling_price AS SIGNED)'));
        } else if ($by == 'color') {
            $max = Product::where('product_color_en', 'like', '%' . $name . '%')->where('status', 1)->max(\DB::raw('CAST(selling_price AS SIGNED)'));
        }
        
         

        $limit_min = isset($_GET['min']) ? $_GET['min'] :0;
        $limit_max = isset($_GET['max']) ? $_GET['max'] :$max;

        $color_en = $this->color_en;
        $color_bn = $this->color_bn;

        $brands = Brand::orderBy('id','asc')->get();
        //return $max;
        return view('frontend.all_product', compact('categories','allTagsen','allTagsbn','products', 'color_en', 'color_bn','brands','limit','sort','max','limit_max','limit_min','name'));
    }
}
