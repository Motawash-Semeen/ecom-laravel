<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function StripePayment(Request $request){
        if(Auth::check()){
            $total = session()->has('coupon') ? session()->get('coupon')['totla_after_discount'] : Cart::total();

        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            
            $charge = Charge::create([
                'amount' => round($total) * 100, // amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment to Ecommerce',
                'metadata' => [
                    'order_id' => uniqid(),
                ],
            ]);
            $total = session()->has('coupon') ? session()->get('coupon')['totla_after_discount'] : Cart::total();
            $order = new Order;
            $order->user_id = Auth::id();
            $order->division_id = $request->division_id;
            $order->city_id = $request->city_id;
            $order->area_id = $request->area_id;
            $order->name = $request->shipping_name;
            $order->email = $request->shipping_email;
            $order->phone = $request->shipping_phone;
            $order->post_code = $request->post_code;
            $request->notes ? $order->notes = $request->notes:'';
            $order->payment_type = 'Stripe';
            $order->payment_method = 'Stripe';
            $order->transaction_id = $charge->balance_transaction;
            $order->currency = $charge->currency;
            $order->amount = $total;
            $order->order_number = $charge->metadata->order_id;
            $order->invoice_number = 'Ecommerce-'.uniqid();
            $order->order_date = time();
            $order->save();

            $carts = Cart::content();
            foreach ($carts as $cart) {
                $orderitem = new OrderItem;

                $orderitem->order_id = $order->id;
                $orderitem->product_id = $cart->id;
                $orderitem->color = $cart->options->color; 
                $cart->options->size ? $orderitem->size = $cart->options->size :''; 
                $orderitem->price = $cart->price;
                $orderitem->qty = $cart->qty;
                $orderitem->save();

                $product = Product::find($cart->id);
                $product->product_qty = $product->product_qty - $cart->qty;
                $product->save();
            }
            
            
            if(Session::has('coupon')){
                Session::forget('coupon');
            }
            Cart::destroy();
            return redirect('/')->with('success', 'Payment successful');
            //dd($charge);
        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        }
        else{
            $notification = array(
                'message' => 'Please Login First',
                'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
        
        
    }
}
