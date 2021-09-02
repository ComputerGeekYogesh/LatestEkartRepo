<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Models\Products;
use App\Models\Models\wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        //$products = new Products();           ,'products'
        $wishlist = wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist.index',compact('wishlist'));
    }

    public function storewishlist(Request $request)   //*already addded
    {
        $product_id = $request->product_id;
        if( wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->exists())
        {
            return response()->json(['status'=>'Product is already Added to Wishlist']);
        }

        else
        {
             $wishlist = new wishlist();         //*please addded
             $wishlist->user_id = Auth::id();
             $wishlist->product_id= $product_id;
             $wishlist->save();
             return response()->json(['status'=>'Product is Added to Wishlist']);


            }

    }
    public function removefromwishlist(Request $request)
    {
        $wishlist_id = $request->wishlist_id;
        if( wishlist::where('user_id',Auth::id())->where('id',$wishlist_id)->exists())
        {
            $wishlist = wishlist::where('user_id',Auth::id())->where('id',$wishlist_id)->first();
            $wishlist->delete();
            return response()->json(['status'=>'Item Removed from Wishlist']);
        }

        else
        {
             return response()->json(['status'=>'No Items Found in  Wishlist']);
            }


    }

}
