<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Models\Coupon;
use App\Models\Models\Products;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index(){
        $products = Products::where ('status','0')->get();;
        $coupon = Coupon::where ('status','!=','3')->get();
        return view ('admin.coupon.index')->with('coupon',$coupon)->with('products',$products);
    }

    public function store(Request $request){
        $coupon = new Coupon();
        $coupon->offer_name = $request->input('offer_name');
        $coupon->product_id = $request->input('product_id');
        $coupon->coupon_code = $request->input('coupon_code');
        $coupon->coupon_limit = $request->input('coupon_limit');
        $coupon->coupon_type = $request->input('coupon_type');
        $coupon->coupon_price = $request->input('coupon_price');
        $coupon->start_datetime = $request->input('start_datetime');
        $coupon->end_datetime = $request->input('end_datetime');
        $coupon->status = $request->input('status') == true ? '1':'0';
        $coupon->visibility_status = $request->input('visibility_status') == true ? '1':'0';
        $coupon->save();
        return redirect()->back()->with('status','Coupon Code Added Successfully');
}

public function edit($id) {
    $products = Products::where ('status','0')->get();;
    $coupon = Coupon::find($id);
    return view ('admin.coupon.edit')->with('coupon',$coupon)->with('products',$products);

}

public function update(Request $request, $id) {
    $coupon = Coupon::find($id);
    $coupon->offer_name = $request->input('offer_name');
    $coupon->product_id = $request->input('product_id');
    $coupon->coupon_code = $request->input('coupon_code');
    $coupon->coupon_limit = $request->input('coupon_limit');
    $coupon->coupon_type = $request->input('coupon_type');
    $coupon->coupon_price = $request->input('coupon_price');
    $coupon->start_datetime = $request->input('start_datetime');
    $coupon->end_datetime = $request->input('end_datetime');
    $coupon->status = $request->input('status') == true ? '1':'0';
    $coupon->visibility_status = $request->input('visibility_status') == true ? '1':'0';
    $coupon->update();
    return redirect('coupons')->with('status','Coupon Code Updated Successfully');

}




}
