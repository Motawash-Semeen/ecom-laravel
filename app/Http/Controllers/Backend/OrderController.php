<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.orders.order_view', compact('orders'));
    }
    public function details($id)
    {
        $order = Order::with('division', 'city', 'area')->where('id', $id)->first();
        $orderitems = OrderItem::where('order_id', $id)->get();
        //return $order;
        return view('admin.orders.order_details', compact('order', 'orderitems'));
    }
    public function statusUpdate($id)
    {
        $order = Order::find($id);
        if ($order->status == 'pending') {
            $order->status = 2;
            $order->confirmed_date = time();
        }
        if ($order->status == 'confirmed') {
            $order->status = 3;
            $order->processing_date = time();
        }
        if ($order->status == 'processing') {
            $order->status = 4;
            $order->picked_date = time();
        }
        if ($order->status == 'picked') {
            $order->status = 5;
            $order->shipped_date = time();
        }
        if ($order->status == 'shipped') {
            $order->status = 6;
            $order->delivary_date = time();
        }
        $order->update();
        $notification = array(
            'message' => 'Order Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        $notification = array(
            'message' => 'Order Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
