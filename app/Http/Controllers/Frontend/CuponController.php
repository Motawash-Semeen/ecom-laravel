<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CuponController extends Controller
{
    public function applyCupon(Request $request)
    {
        $cupon = $request->cupon;
        $query = Cupon::where("cupon_name", $cupon)->where('status', 1)->first();
        //$total = round(Cart::total());

        if ($query) {
            $time = explode(" - ", $query->cupon_validity);
            $start_time = strtotime(date($time[0]));
            $end_time = strtotime(date($time[1]));
            $current_time = time();
            if ($current_time < $start_time || $current_time > $end_time || $query->cupon_limit == 0) {
                return response()->json([
                    "status" => "error",
                    "message" => "Cupon Code Expired",
                ]);
            } else {
                $query->cupon_limit = $query->cupon_limit-1;
                $query->update();
                $total = floatval(str_replace(',', '', Cart::total()));
                Session::put('coupon', [
                    'cupon_id' => $query->id,
                    'cupon_name' => $query->cupon_name,
                    'discount' => $query->cupon_discount,
                    "start_time" => $start_time,
                    "end_time" => $end_time,
                    "current_time" => $current_time,
                    "total_amount" => $total,
                    "discount_amount" => $total * ($query->cupon_discount / 100),
                    "totla_after_discount" => $total - ($total * ($query->cupon_discount / 100)),
                ]);

                return response()->json([
                    "status" => "success",
                    "message" => "Cupon Applied Successfully",
                    "data" => $query,
                    "start_time" => $start_time,
                    "end_time" => $end_time,
                    "current_time" => $current_time,
                    "total_amount" => $total,
                    "discount_amount" => $total * ($query->cupon_discount / 100),
                    "totla_after_discount" => $total - ($total * ($query->cupon_discount / 100)),
                ]);
            }
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Invalid Cupon Code",
            ]);
        }
    }
    public function ViewCupon()
    {
        if (Session::has("coupon")) {
            $cupon_name = Session::get("coupon")['cupon_name'];
            $discount = Session::get("coupon")['discount'];
            $start_time = Session::get("coupon")['start_time'];
            $end_time = Session::get("coupon")['end_time'];
            $current_time = Session::get("coupon")['current_time'];
            $total_amount = Session::get("coupon")['total_amount'];
            $discount_amount = Session::get("coupon")['discount_amount'];
            $discount_amount = round($discount_amount);
            $totla_after_discount = Session::get("coupon")['totla_after_discount'];
            $totla_after_discount = round($totla_after_discount);
            $subtotal = Cart::subtotal();
            $tax = Cart::tax();

            return response()->json([
                "cupon_name" => $cupon_name,
                "discount" => $discount,
                "start_time" => $start_time,
                "end_time" => $end_time,
                "current_time" => $current_time,
                "total_amount" => $total_amount,
                "discount_amount" => $discount_amount,
                "totla_after_discount" => $totla_after_discount,
                'subtotal' => $subtotal,
                'tax' => $tax,
            ]);
        }
        else{
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        
        return response()->json([
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
            'subtotal' => $subtotal,
            'tax' => $tax,
        ]);
        }
    }
    public function removeCupon()
    {
        Session::forget("coupon");
        return response()->json([
            "status" => "Success",
            "message" => "Remove Cupon Successfully",
        ]);
    }
    
}
