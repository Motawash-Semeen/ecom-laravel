<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfileController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        //return $orders;
        return view('dashboard', compact('orders'));
    }
    public function show()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('dashboard', compact('user', 'orders'));
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->file('profile_photo_path')){
            
            if($user->profile_photo_path != null && file_exists(public_path('upload/profile/'.$user->profile_photo_path))){
                unlink(public_path('upload/profile/'.$user->profile_photo_path));
            }
            $file = $request->file('profile_photo_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'user-profile-image.'.$extension;
            $file->move('upload/profile/', $filename);
            $user->profile_photo_path = $filename;
        }
        $user->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function passwordForm()
    {
        return view('dashboard');
    }
    public function updatePassword(Request $request, LogoutResponse $response){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',

        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            if(!Hash::check($request->new_password, $hashedPassword)){

                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->new_password);
                
                $user->save();
                // Auth::logout();
                $notification = array(
                    'message' => 'Password Updated Successfully',
                    'alert-type' => 'success'
                );
                return redirect('logout')->with($notification);

            }else{
                $notification = array(
                    'message' => 'New Password can not be the same as old password',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Old Password Does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function OrderView($id){
        $order = Order::with('division','city','area')->where('id', $id)->first();
        $orderitems = OrderItem::with('product')->where('order_id', $id)->get();
        //return $orderitems;
        return view('dashboard', compact('order', 'orderitems'));
    }
    public function OrderReturn($id){
        $order = Order::with('division','city','area')->where('id', $id)->first();
        $orderitems = OrderItem::with('product')->where('order_id', $id)->get();
        //return $orderitems;
        return view('dashboard', compact('order', 'orderitems'));
    }

    public function InvoiceDownload($id){
        $order = Order::with('division','city','area')->where('id', $id)->first();
        $orderitems = OrderItem::with('product')->where('order_id', $id)->get();
        $pdf = Pdf::loadView('pdf.order_invoice', compact('order', 'orderitems'))->setPaper('a4');
        return $pdf->download('invoice.pdf');
        //return $orderitems;
        //return view('pdf.order_invoice', compact('order', 'orderitems'));
    }
    public function OrderReturnStore(Request $request, $id) {
        $request->validate([
            'return_reason' => 'required',
        ],[
            'return_reason.required'=> 'This field is required',
        ]);
        $order = Order::where('id', $id)->first();
        $order->return_date = time();
        $order->return_reason = $request->return_reason;
        $order->update();
        $notification = array(
            'message' => 'Order Return Request Sent Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
}
public function AllReturn(){
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->where('return_reason','!=',null)->orderBy('id', 'DESC')->get();
        //return $orderitems;
        return view('dashboard', compact('orders'));
}
}
