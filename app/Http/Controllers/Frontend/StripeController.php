<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            $order->address = $request->address;
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
            $order->tax = Cart::tax();
            session()->has('coupon') ? $order->discount = session()->get('coupon')['discount_amount'] : '';
            $order->order_number = $charge->metadata->order_id;
            $order->invoice_number = 'Ecommerce-'.mt_rand(100000, 999999);
            $order->order_date = time();
            $order->save();

            $carts = Cart::content();

            $invoice = Order::findOrFail($order->id);
            $data = [
                'invoice' => $invoice->invoice_number,
                'amount' => $total,
                'name' => $request->shipping_name,
                'email' => $request->shipping_email,

            ];
            try{
                Mail::to($request->shipping_email)->send(new OrderMail($data));
            }
            catch (\Exception $e) {
                dd($e->getMessage());
            }
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
            $notification = array(
                'message' => 'Payment successful',
                'alert-type' => 'success');
            return redirect('/')->with($notification);
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
