<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;

class CuponController extends Controller
{
    public function show()
    {
        $cupons = Cupon::all();
        return view('admin.cupon.cupon_view', compact('cupons'));
    }
    public function store(Request $request)
    {
            
            $request->validate(
                [
                    'cupon_name' => 'required',
                    'cupon_discount' => 'required',
                    'cupon_validity' => 'required',
                    'cupon_limit' => 'required',
                ],
                [
                    'cupon_name.required' => 'Input Cupon Name',
                    'cupon_discount.required' => 'Input Cupon Discount Amount',
                    'cupon_validity.required' => 'Input Cupon Validity',
                    'cupon_limit.required' => 'Input Cupon Limit',
                ]
            );

                if(isset($request->id)){
                    $id = $request->id;
                    $cupon =  Cupon::find($id);
                }
                else{
                    $cupon = new Cupon;
                }
                // $brand = new Brand();
                $cupon->cupon_name = $request->cupon_name;
                $cupon->cupon_discount = $request->cupon_discount;
                $cupon->cupon_validity = $request->cupon_validity;
                $cupon->cupon_limit = $request->cupon_limit;

                $cupon->save();
                $notification = array(
                    'message' => 'Cupon Added/Updated Successfully',
                    'alert-type' => 'success'
                );
        //return $request->all();
        return redirect('admin/cupons')->with($notification);
    }

    public function delete($id)
    {
        $cupon = Cupon::find($id);
        $cupon->delete();
        $notification = array(
            'message' => 'Cupon Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $cupons = Cupon::all();
        $cupon_edit = Cupon::find($id);
        return view('admin.cupon.cupon_view', compact('cupon_edit', 'cupons'));
    }
    public function status($id)
    {
        $cupon = Cupon::find($id);
        if ($cupon->status == 1) {
            $cupon->status = 0;
        } else {
            $cupon->status = 1;
        }
        $cupon->save();
        $notification = array(
            'message' => 'Cupon Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
