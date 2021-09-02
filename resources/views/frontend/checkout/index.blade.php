@extends ('layouts.frontend')

@section ('title')
Checkout
@endsection


@section('content')

<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Checkout</h5>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-3 ">
                @if(Cookie::get('shopping_cart') != null)
                <div class="card">
                    <div class="card-body">
                <form action = "{{url('/place-order')}}" method="POST" novalidate>
                    {{-- novalidate because a error occurs invalid form control name ='' --}}
                    {{-- place-order --}}
                 @csrf
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{Auth::user()->name}}" placeholder="First Name">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" name="last_name"class="form-control" value="{{Auth::user()->last_name}}" placeholder="Last Name">
</div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="">Phone Number</label>
        <input type="text" name="phone_no"class="form-control" value="{{Auth::user()->phone}}" placeholder="Phone Number">
</div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="">Alternate Number</label>
        <input type="text" name="alternate_no"class="form-control" value="{{Auth::user()->alternate_phone}}" placeholder="Alternate Number">
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="">Addresss 1</label>
        <input type="text" name="address1"class="form-control" value="{{Auth::user()->address1}}" placeholder="No #2, flat No">
</div>
<div class="form-group">
    <label for="">Addresss 2</label>
    <input type="text" name="address2"class="form-control"value="{{Auth::user()->address2}}" placeholder="Church Street, POST">
</div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="">City</label>
        <input type="text" name="city"class="form-control" value="{{Auth::user()->city}}"placeholder="City">
</div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="">State</label>
        <input type="text" name="state"class="form-control" value="{{Auth::user()->state}}" placeholder="State">
</div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="">Pincode</label>
        <input type="number" name="pincode"class="form-control" value="{{Auth::user()->pincode}}" placeholder="Pincode">
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email"class="form-control" value="{{Auth::user()->email}}" placeholder="Email Address">
</div>
</div>
</div>
</div>
</div>
@endif
</div>
<div class="col-md-5 ">
    <div class="card mb-3">
        <div class="card-body my-3">

            <div class="col-md-12">
                <label for=""> Coupon Code</label>
            <input type="text" name="coupon_code" class="form-control coupon_code" placeholder="Enter Coupon Code" >
            <button class="btn btn-success apply_coupon_btn" style="width:100%; margin-left:1px; margin-top:10px;">Apply</button> </div>
            <small id="error_coupon" class="text-danger"></small>
        </div>
    </div>

@if(isset($cart_data))
@if(Cookie::get('shopping_cart'))
    @php $total="0" @endphp
    <table class="table" >
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($cart_data as $data)
            <tr>
                <td>{{ $data['item_name'] }}</td>
                <td>{{ number_format($data['item_price'], 0) }}</td>
                <td>{{ $data['item_quantity'] }}</td>
                @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div class="text-right">
        <h6>Sub Total: {{ number_format($total, 0) }} </h6>
        <h6>Discount: <span class= "discount_price">0.00</span> </h6>
      <h5>Grand Total: <span class= "grandtotal_price"> {{ number_format($total, 0) }}</span> </h5>
    </div>

    <div class="card my-4">
        <div class="card-body">

<div class="col-md-12 my-2">
    <label for=""> Payment Methods</label>
    <button type="submit" name= "place_order_btn" class="btn btn-primary btn-block">Cash on delievery</button>
    {{-- Place Your Order --}}
</div>
<div class="col-md-12 my-2 ">
    <button type="button" class= "razorpay_pay_btn btn btn-info btn-block">Razorpay - Pay Online</button>
</div>
<div class="col-md-12">
    @include('frontend.checkout.stripepaymodal')
    <button type="button" data-toggle="modal" data-target="#StripeCardModal" class= " btn btn-danger btn-block ">Stripe - Pay Online</button>
</div>
</form>

            {{-- <div class="input-group">
                <input type="text" name="coupon_code" class="form-control coupon_code" placeholder="Enter Coupon Code">
                <div class="input-group-append">
                    <button class="btn btn-success apply_coupon_btn">Apply</button>
                </div>
            </div>
            <small id="error_coupon" class="text-danger"></small>
        </div>
    </div> --}}
    @endif
    @else
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="shadow border py-5">
                    <h4>Your cart is currently empty.</h4>
                    <a href="{{ url('collections') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                </div>
            </div>
        </div>
    @endif

</div>
</div>

</section>
@endsection

@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="{{asset('assets/js/checkout.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{asset('assets/js/stripe-checkout.js')}}"></script>
@endsection
