<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addWishlist($id){
        $user_id = Auth::id();
        if(!Auth::check()){
            return response()->json(["error" => "Please Login First"]);
        }
        $findlist = Wishlist::where("user_id",$user_id)->where("product_id",$id)->first();
        if($findlist) {
            return response()->json(["error" => "Already Added"]);
        }
        else{
            $wishlist = new Wishlist();
            $wishlist->user_id = $user_id;
            $wishlist->product_id = $id;
            $wishlist->save();
            return response()->json(["success" => "Added to Wishlist"]);
        }

    }
    public function viewWishlist(){
        if(Auth::check()) {
            $wishlists = Wishlist::with('product')->where("user_id", Auth::id())->get();
            //return $wishlist;
            return view("frontend.wishlist", compact("wishlists"));
        }
        else{
            return redirect("/login");
        }
    }
    public function removeWishlist($id){
    if(Auth::check()) {
        $wishlists = Wishlist::where("user_id", Auth::id())->where("product_id", $id)->delete();
        $notification = array(
            'message' => 'Product Removed from Wishlist',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    else{
        return redirect("/login");
    }
    }
}
