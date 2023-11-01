<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartStore(Request $request, $id){
        $product = Product::where('id',$id)->where('status',1)->first();
        if($product->discount_price != NULL)
        {
            $sellingPrice = floatval($product->selling_price);
            $discount = floatval($product->discount_price);
            $price = $sellingPrice - ($sellingPrice * $discount / 100);
        }
        else
        {
            $price = $product->selling_price;
        }
        Cart::add(['id' => $id, 'name' => $product->product_name_en, 'qty' => $request->qty, 'price' => $price, 'weight' => 1, 'options' => ['size' => $request->size, 'color' => $request->color, 'image' => $product->product_thambnail]]);

        return response()->json(['success' => 'Product added successfully']);
       
    }
}
