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
    public function CheckoutCreate()
    {
        if (Auth::check()) {

            if (Cart::count() == 0) {
                $notification = array(
                    'message' => 'Please Add Atlest One Product',
                    'alert-type' => 'error'
                );
                return redirect('/')->with($notification);
            } else {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $cartTax = Cart::tax();
                $subtotal = Cart::subtotal();
                $divisions = Division::orderBy('id', 'asc')->get();

                return view('frontend.checkout', compact('carts', 'cartQty', 'cartTotal', 'cartTax', 'subtotal', 'divisions'));
            }
        } else {
            $notification = array(
                'message' => 'Please Login First',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }

    public function CheckoutStore(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'division_id' => 'required',
                'city_id' => 'required',
                'area_id' => 'required',
                'address' => 'required',
                'shipping_name' => 'required',
                'shipping_email' => 'required|email',
                'shipping_phone' => 'required',
                'post_code' => 'required',
                'method' => 'required',
            ],
            [
                'division_id.required' => 'Please Select Your Division',
                'city_id.required' => 'Please Select Your City',
                'area_id.required' => 'Please Select Your Area',
                'address.required' => 'Please Enter Your Address',
                'shipping_name.required' => 'Please Enter Your Name',
                'shipping_email.required' => 'Please Enter Your Email',
                'shipping_email.email' => 'Please Enter Valid Email',
                'shipping_phone.required' => 'Please Enter Your Phone Number',
                'post_code.required' => 'Please Enter Your Post Code',
                'method.required' => 'Please Select Your Payment Method'
            ]
        );
        $data = array();
        $data['user_id'] = Auth::id();
        $data['division_id'] = $request->division_id;
        $data['city_id'] = $request->city_id;
        $data['area_id'] = $request->area_id;
        $data['address'] = $request->address;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;
        $total = session()->has('coupon') ? session()->get('coupon')['totla_after_discount'] : Cart::total();

        if ($request->method == 'Stripe') {
            return view('frontend.stripe', compact('data', 'total'));
        }
        elseif($request->method == 'Card'){
            return 'Card';
        }
        elseif($request->method == 'COD'){
            return view('frontend.cod', compact('data', 'total'));
            }
        else{
            $notification = array(
                'message' => 'Please Select Payment Method',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function getCity()
    {
        $division_id = $_GET['division_id'];
        $cities = City::where('division_id', $division_id)->get();
        return response()->json($cities);
    }
    public function getArea()
    {
        $city_id = $_GET['city_id'];
        $cities = PostOffice::where('city_id', $city_id)->get();
        return response()->json($cities);
    }
}
