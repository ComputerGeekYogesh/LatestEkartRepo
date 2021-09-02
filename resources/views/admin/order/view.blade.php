@extends ('layouts.admin')

@section('content')
        <div class="row ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body mt-3">
                    <h3 class= "mb-0">
                        Orders View
                        <a href="{{url('generate-invoice/'.$orders->id)}}" class="btn btn-success float-right ">Generate Invoice</a>
    </h3>
</div></div></div></div>
<div class="container-fluid">
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <h5>Order Details</h5>
                <div class="row ">
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Tracking No</label>
                            <h6>{{ $orders->tracking_no}}</h6>
                        </div>
                    </div>
                    <div class="col-md-8 mt-3">
                        <div class="border p-2 ">
                            <label> Tracking Msg</label>
                            <h6>{{ isset($orders->tracking_msg) ==true ? $orders->tracking_msg:'Nothing updated' }}</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Payment Mode</label>
                            <h6>{{ $orders->payment_mode}}</h6>
                        </div>
                    </div>
                     {{-- placing order

                    Rules for Payment_status

                    0 - Nothing Paid
                    1 - Cash paid
                    2 - Razorpay payment successfull
                    3 - Razorpay paymnet failed
                    4 - stripe successful
                    5 - stripe failed   --}}
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label>Payment Status </label>
                            <h6>
                                @if($orders->payment_status == 0)
                                COD - Pending
                                @elseif ($orders->payment_status == 1)
                                COD - Paid
                                @elseif ($orders->payment_status == 2)
                                Razorpay Successful
                                @elseif ($orders->payment_status == 3)
                                Razorpay Failed
                                @elseif ($orders->payment_status == 4)
                                Stripe Successful
                                @elseif ($orders->payment_status == 5)
                                Stripe Failed
                                @endif
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Payment ID</label>
                           <h6>{{ isset($orders->payment_id) ==true ? $orders->payment_id:'COD Payment - No id' }} </h6>
                        </div>
                    </div>
                     {{-- placing order

                    Rules for Order status

                    0 - Pending
                    1 - Completed
                    2 - Rejected/Cancelled
                    --}}

                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Order Status</label>
                            <h6>
                                @if($orders->order_status == 0)
                                Pending
                                @elseif ($orders->order_status == 1)
                                 Completed
                                @elseif ($orders->order_status == 2)
                                Rejected/Cancelled
                                @endif
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Cancelled Reason</label>
                            <h6>
                                {{ isset($orders->cancel_reason) ==true ? $orders->cancel_reason:'Not Cancelled' }}
                                </h6>
                        </div>
                    </div>
                </div>
                <hr class = "bg-dark">
                <h5>Ordered Items</h5>
                <div class="row">
                    <div class="col-md-12">
                        <table class = "table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = "0"; @endphp
                                @foreach ($orders->orderitems as $item)
                                <tr>
                                    <td> {{$item->id}}</td>
                                    <td> {{$item->products->name}} </td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{number_format($item->price,0)}}</td>
                                    <td>{{number_format($item->price * $item->quantity) }}</td>
                                </tr>
                                @php $total = $total + ($item->price * $item->quantity) @endphp
                                @endforeach
                                @if(!empty($item->discount_price && $item->grand_total))
                                <tr>
                                    <td colspan="4" class="text-right">Sub Total</td>
                                    <td>{{number_format($total,0)}} </td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="text-right">Discount</td>
                                    <td>{{number_format($item->discount_price,0)}}</td>
                                </tr>

                                <tr>

                                    <td colspan="4" class="text-right">Grand Total</td>
                                    <td> {{number_format($item->grand_total,0)}} </td>
                                </tr>

                                @else
                                <tr>
                                    <td colspan="4" class="text-right">Grand Total</td>
                                    <td>{{number_format($total,0)}} </td>
                                </tr>
                                @endif

                                {{-- if product has tax on it --}}

                                {{-- <tr>
                                    <td colspan="4" class="text-right">Tax Amount</td>
                                    <td> --}}
                                        {{-- Grand_Total = total_amount * Tax / 100 --}}
                                        {{-- @if(isset($item->tax_amt))
                                        @php
                                        $tax = $item->tax_amt;
                                        $tax_total = ($total * $tax) / 100;
                                        @endphp
                                        {{number_format($tax_total)}}
                                        @else
                                        0
                                        @endif
                                    </td> --}}
                                {{-- </tr> --}}


                                {{-- <tr>
                                    <td colspan="4" class="text-right">Grand Total</td>
                                    <td> --}}
                                        {{-- @if(isset($item->tax_amt))
                                        @php

                                        $grandtotal = $tax_total + $total;  @endphp
                                        {{number_format($grandtotal,0)}}

                                        @else
                                        {{number_format($total,0)}}
                                        @endif
                                    </td> --}}
                                {{-- </tr> --}}
                            </tbody>
                        </table>
        </div>
        </div>
        </div>
        </div>
        <div class = "card mt-3">
            <div class = "card-body">
                <h5>Customer Details</h5>
                <div class="row ">
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> First Name</label>
                            <h6>{{ $orders->users->name}}</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Last Name</label>
                            <h6>{{ $orders->users->last_name}}</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Email Id</label>
                            <h6>{{ $orders->users->email}}</h6>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="border p-2 ">
                            <label> Address 1</label>
                            <h6>{{ $orders->users->address1}}</h6>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="border p-2 ">
                            <label>  Address 2</label>
                            <h6>{{ $orders->users->address2}}</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> City</label>
                            <h6>{{ $orders->users->city}}</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> State</label>
                            <h6>{{ $orders->users->state}}</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="border p-2 ">
                            <label> Pincode </label>
                            <h6>{{ $orders->users->pincode}}</h6>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="border p-2 ">
                            <label>Phone </label>
                            <h6>{{ $orders->users->phone}}</h6>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="border p-2 ">
                            <label>Alternate Phone </label>
                            <h6>{{ $orders->users->alternate_phone}}</h6>
                        </div>
                    </div>

        </div>  </div>  </div>

        @endsection
