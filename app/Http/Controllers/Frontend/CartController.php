<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartStore(Request $request, $id)
    {
        $product = Product::where('id', $id)->where('status', 1)->first();
        if ($product->discount_price != NULL) {
            $sellingPrice = floatval($product->selling_price);
            $discount = floatval($product->discount_price);
            $price = $sellingPrice - ($sellingPrice * $discount / 100);
        } else {
            $price = $product->selling_price;
        }
        Cart::add(['id' => $id, 'name' => $product->product_name_en, 'qty' => $request->qty, 'price' => $price, 'weight' => 1, 'options' => ['size' => $request->size, 'color' => $request->color, 'image' => $product->product_thambnail, 'max_qty' => $product->product_qty]]);

        return response()->json(['success' => 'Product added successfully']);
    }
    public function miniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ]);
    }
    public function miniCartRemove($id)
    {
        Cart::remove($id);
        return response()->json(['success' => 'Product remove successfully']);
    }
    public function showCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();

        //return $carts;
        return view('frontend.shopping_cart', compact('carts', 'cartQty', 'cartTotal', 'tax', 'subtotal'));
    }
    public function allCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
            'subtotal' => $subtotal,
            'tax' => $tax,
        ]);
    }
    public function updateCart(Request $request, $id)
    {
        Cart::update($id, $request->qty);
        if (Session::has("coupon")) {
            $query = Cupon::where('cupon_name', Session::get("coupon")['cupon_name'])->first();
            $total = floatval(str_replace(',', '', Cart::total()));
            Session::put('coupon', [
                'cupon_id' => $query->id,
                'cupon_name' => $query->cupon_name,
                'discount' => $query->cupon_discount,
                "start_time" => Session::get("coupon")['start_time'],
                "end_time" => Session::get("coupon")['end_time'],
                "current_time" => Session::get("coupon")['current_time'],
                "total_amount" => $total,
                "discount_amount" => $total * ($query->cupon_discount / 100),
                "totla_after_discount" => $total - ($total * ($query->cupon_discount / 100)),
            ]);
            return response()->json(['success' => 'Cart Updated Successfully', 'total' => $total, 'query' => $query]);
        }
        return response()->json(['success' => 'Cart Updated Successfully']);
        //return redirect()->back()->with('success', 'Cart updated successfully');
    }
}
