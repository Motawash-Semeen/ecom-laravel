<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Division;
use App\Models\PostOffice;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutCreate(){
        if(Auth::check()){

            if(Cart::count()==0){
                $notification = array(
                    'message' => 'Please Add Atlest One Product',
                    'alert-type' => 'error');
                return redirect('/')->with($notification);
            }
            else{
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $cartTax= Cart::tax();
                $subtotal = Cart::subtotal();
                $divisions = Division::orderBy('id', 'asc')->get();

                return view('frontend.checkout', compact('carts', 'cartQty', 'cartTotal','cartTax','subtotal','divisions'));
            }
        }
        else{
            $notification = array(
                'message' => 'Please Login First',
                'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }

    public function CheckoutStore(Request $request){
        // return $request->all();
        if($request->method == 'Stripe'){
            return view('frontend.stripe');
        }
    }

    public function getCity(){
        $division_id = $_GET['division_id'];
        $cities = City::where('division_id', $division_id)->get();
        return response()->json($cities);
    }
    public function getArea(){
        $city_id = $_GET['city_id'];
        $cities = PostOffice::where('city_id', $city_id)->get();
        return response()->json($cities);
    }
}
