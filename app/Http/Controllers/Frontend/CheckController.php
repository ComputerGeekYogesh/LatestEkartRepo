<?php

namespace App\Http\Controllers\Frontend;

use Create;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Models\Order;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use App\Models\Models\Coupon;
use Illuminate\Support\Carbon;
use App\Models\Models\Products;

use App\Models\Models\Orderitem;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class CheckController extends Controller
{

    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('frontend.checkout.index')->with('cart_data', $cart_data);
    }

    public function checkingcoupon(Request $request)
    {
        $couponcode = $request->input('coupon_code');
        if (Coupon::where('coupon_code',$couponcode)->exists())
        {
           $coupon = Coupon::where('coupon_code',$couponcode)->first();
           if($coupon->start_datetime <= Carbon::today()->format('Y-m-d') && Carbon::today()->format('Y-m-d') <= $coupon->end_datetime )
           {
            $totalprice = "0";
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            foreach ($cart_data as $itemdata)
            {
                $products = Products::find($itemdata['item_id']);
                $prod_price = $products->offer_price;

                // $prod_price_with_tax = ($prod_price * $products->tax_amt)/100;  //* Tax, Vat, GST

                $totalprice = $totalprice + ($itemdata["item_quantity"] * $prod_price);
           }

                //* Coupon Type (Checking Percentage or Amount)
                if($coupon->coupon_type == "1") //* 1 -> Percentage
                {
                    $discount_price = ($totalprice / 100) * $coupon->coupon_price;
                }
                elseif($coupon->coupon_type == "2") //* 2 -> Amount
                {
                    $discount_price = $coupon->coupon_price;
                }
                $grand_total = $totalprice - $discount_price;

                //* i like it
                $request->session()->put('data',['discount_price'=> $discount_price, 'grand_total'=> $grand_total]);

                return response()->json([
                'discount_price' => $discount_price,
                'grand_total_price' => $grand_total,
                'status' => 'Coupon Code Applied Succesfully.',
                ]);

                //* Dont write lines of code here because function is return back above

                //$this->storeorder( $request, $discount_price, $grand_total);

                // return redirect()->action(
                //     [CheckController::class, 'storeorder'], ['discount_price' => $discount_price ,'grand_total' => $grand_total]
                // );



           }

           else
           {
            return response()->json(['status' => 'Coupon Code has been Expired.',
            'error_status' => 'error'
            ]);
           }
        }

    else
    {
        return response()->json(['status' => 'Coupon Code does not exists.',
        'error_status' => 'error'
    ]);
    }
}

    private function update_user($user_id, $request)
    {
        $user = User::find($user_id);
        $user->name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->pincode =  $request->input('pincode');
        $user->phone = $request->input('phone_no');
        $user->alternate_phone = $request->input('alternate_no');
        return $user->save();
    }
   // , $discount_price, $grand_total
    private function insert_orderitem( $last_order_id)
    {

        $discount_price = null;
        $grand_total = null;

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $item_in_cart = $cart_data;

        if (session()->has('data')) {
        $discount_price = session()->get('data')['discount_price'];
        $grand_total = session()->get('data')['grand_total'];
        }

        foreach ($item_in_cart as $itemdata) {
            $products = Products::find($itemdata['item_id']);
            $pric_value = $products->offer_price;
            $tax_amt = $products->tax_amt;
            Orderitem::create([
                'order_id' => $last_order_id,
                'product_id' => $itemdata['item_id'],
                'price' => $pric_value,
                'tax_amt' => $tax_amt,
                'quantity' => $itemdata['item_quantity'],
                'discount_price'  => $discount_price,
                'grand_total'    => $grand_total,
            ]);
        }
    }

    private function placeorderMailable($request,$trackingno, $discount_price, $grand_total)
    {
        $contact_data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_no' => $request->input('phone_no'),
            'alternate_no' => $request->input('alternate_no'),
            'address1' => $request->input('address1'),
            'address2' => $request->input('address2'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'pincode' => $request->input('pincode'),
            'email' => $request->input('email'),
            'trackingno' =>$trackingno,
            'discount_price' => $discount_price ,
            'grand_total' => $grand_total ,
        ];

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $items_in_cart = json_decode($cookie_data, true);
        $to_customer_email = $request->input('email');
        Mail::to($to_customer_email)->send(new ContactMailable($contact_data, $items_in_cart));

    }

    public function storeorder( Request $request)

    {
        $discount_price = null;
        $grand_total = null;

    if ($request->session()->has('data')) {
        $discount_price = session()->get('data')['discount_price'];
        $grand_total = session()->get('data')['grand_total'];
    }

        if (isset($_POST['place_order_btn'])) {

            //* user data  update
            $user_id = Auth::id();
            $this->update_user($user_id, $request);


            //* placing order
            /*
            Rules for Payment_status

            0 - Nothing Paid
            1 - Cash paid
            2 - Razorpay payment successfull
            3 - Razorpay payment failed
            4 - Paytm, stripe


           */
            $trackno = rand(1111, 9999);
            $order = new Order;
            $order->user_id = $user_id;
            $order->tracking_no = 'ekart' . $trackno;
            //$order->tracking_msg = $;
            $order->payment_mode = "Cash on Delivery ";
            // $order->payment_id = "";
            $order->payment_status = "0";
            $order->order_status = "0";
            $order->notify = "0";
            $order->save();
            $last_order_id = $order->id;
            $trackingno = $order->tracking_no;


            //* ordered - cart items     , $discount_prc, $grand_ttl

            $this->insert_orderitem($last_order_id);

             //* Send Email

            $this->placeorderMailable($request, $trackingno, $discount_price, $grand_total);


            Cookie::queue(Cookie::forget('shopping_cart'));
            $request->session()->forget('data');
            //$request->session()->pull('data',['discount_price'=> $discount_price, 'grand_total'=> $grand_total]);
            // $request->session()->forget('data','discount_price');
            // $request->session()->forget('data','grand_total');
            return redirect('/thank-you')->with('status', 'Order has been placed Successfully');
        }
        if (isset($_POST['place_order_razorpay'])) {
            //* user data  update
            $user_id = Auth::id();
            $this->update_user($user_id, $request);


            //* placing order

            $trackno = rand(1111, 9999);
            $order = new Order;
            $order->user_id = $user_id;
            $order->tracking_no = 'ekart' . $trackno;
            //$order->tracking_msg = $;
            $order->payment_mode = "Payment by Razorpay";
            $order->payment_id = $request->input('razorpay_payment_id');
            $order->payment_status = "2";
            $order->order_status = "0";
            $order->notify = "0";
            $order->save();
            $trackingno = $order->tracking_no;

            $last_order_id = $order->id;


            //* ordered - cart items
            $this->insert_orderitem($last_order_id);

            //* Send Email
            $this->placeorderMailable($request, $trackingno);


            Cookie::queue(Cookie::forget('shopping_cart'));
            return redirect('/thank-you')->with('status', 'Order has been placed Successfully');
        }

        if (isset($_POST['stripe_payment_btn'])) {
            //* user data  update
            $user_id = Auth::id();
            $this->update_user($user_id, $request);

            $total = "0";
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $item_in_cart = $cart_data;

            foreach ($item_in_cart as $itemdata) {
                $products = Products::find($itemdata['item_id']);
                $pric_value = $products->offer_price;
                $total = $total + ($itemdata["item_quantity"] * $pric_value);
            }

            $stripetoken = $request->input('stripeToken');
            $STRIPE_SECRET = "sk_test_51Hw6hoCayZQDaq1yFK9bkCmBeGFu1NwDj4TQ6B0cFmPS5GOMwGoDkjtb4soag32DEAFJtVoXjGnb5HarDeZNaTBy00HttYDHrF";
            Stripe::setApiKey($STRIPE_SECRET);
            \Stripe\Charge::create([
                'amount' => $total * 100,   //*  'amount' => 1 * 100, (Testing purpose)
                'currency' => 'usd',
                'description' => "Thank you for purchasing with Ekart",
                'source' => $stripetoken,
                'shipping' => [
                    'name' => Auth::user()->name,
                    'phone' =>  Auth::user()->phone,
                    'address' => [
                        'line1' =>  Auth::user()->address1,
                        'line2' =>  Auth::user()->address2,
                        'postal_code' =>  Auth::user()->pincode,
                        'city' => "Banglore",
                        'state' => "Karnataka",
                        'country' => 'India',
                    ],
                ],
            ]);

            //* placing order

            $trackno = rand(1111, 9999);
            $order = new Order;
            $order->user_id = $user_id;
            $order->tracking_no = 'ekart' . $trackno;
            //$order->tracking_msg = $;
            $order->payment_mode = "Payment by Stripe";
            $order->payment_id = $stripetoken;
            $order->payment_status = "2";
            $order->order_status = "0";
            $order->notify = "0";
            $order->save();

            $last_order_id = $order->id;
            $trackingno = $order->tracking_no;

            //* ordered - cart items
            $this->insert_orderitem($last_order_id);

             //* Send Email
             $this->placeorderMailable($request, $trackingno);

            Cookie::queue(Cookie::forget('shopping_cart'));
            return redirect('/thank-you')->with('status', 'Order has been placed Successfully');
        }
    }

    public function checkamount(Request $request)
    {

        if (Cookie::get('shopping_cart')) {
            $total = "0";
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $item_in_cart = $cart_data;

            foreach ($item_in_cart as $itemdata) {
                $products = Products::find($itemdata['item_id']);
                $pric_value = $products->offer_price;

                $total = $total + ($itemdata["item_quantity"] * $pric_value);
            }
            return response()->json([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'phone_no' => $request->phone_no,
                'alternate_no' => $request->alternate_no,
                'email' => Auth::user()->email,
                'total_price' => $total
            ]);
        } else {
            return response()->json([
                'status_code' => 'no_data_in_cart',
                'status' => 'Your cart is empty',
            ]);
        }
    }
}
