@extends ('layouts.admin')

@section('content')

<!-- Modal -->
<div class="modal fade" id="CompleteORderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Complete Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('order/complete-order/'.$orders->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}
        <div class="modal-body">
            @if ($orders->payment_status =="0")
            <h6>
                <input type="checkbox" name="cash_received" required> Received Payment (Cash on Delievery)
            </h6>
            <p>Check the Box to Confirm that you received the cash from Customer close this Order </p>
            @else
            <h5>The Payment has been done Online.</h5>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes </button>
          </div>
          </form>
        </div>
      </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class= "mb-0">
                            Orders Status
        </h3>
    </div>
    <div class="col-md-6">
        <a href="{{url('orders')}}" class="float-right py-1 ">BACK</a>
    </div>
</div>
</div>
</div>
</div>

</div>
<div class="container-fluid ">
<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Order Details</h5>
                    </div>
                    <div class="col-md-6">
                        <span class = "float-right">
                            <label class = "bg-warning py-1 px-2 text-dark"> Tracking Id: &nbsp; {{$orders->tracking_no}}</label>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow-sm border">
                            <h6 class ="card-header">Tracking Status</h6>
                            <div class="card-body">
                                <p>
                                    @if($orders->tracking_msg == NULL)
                                    No Status Updated
                                    @else
                                    {{$orders->tracking_msg}}
                                    @endif
                                </p>
                            </div>
                        </div>

                        </div>
                        <div class="col-md-4">

                            <div class="card shadow-sm border">
                                <h6 class ="card-header">Current Status</h6>
                                <div class="card-body">
                                    <p>
                                        @if($orders->order_status == 0)
                                          Order  Pending
                                        @elseif ($orders->order_status == 1)
                                          Order  Completed
                                        @elseif ($orders->order_status == 2)
                                          Order Canceled:
                                        {{$orders->cancel_reason}}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm border">
                                    <h6 class ="card-header">Payment Status</h6>
                                    <div class="card-body">
                                        <p>
                                            @if($orders->payment_status == 0)
                                            Status: {{ _('Payment Pending') }} <br>
                                            Mode: {{ $orders->payment_mode }}

                                @elseif ($orders->payment_status == 1)
                                Status: {{ _('Paid on Delievery') }} <br>
                                Mode: {{ $orders->payment_mode }}

                                @else
                                {{ _('Paid Online') }}
                                @endif
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>



                                {{-- Tracking status update --}}

                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h5>Tracking Status Update</h5>
                                            <hr>
                                            @if($orders->order_status == 1)
                                            {{$orders->tracking_msg}}
                                            @elseif ($orders->order_status == 2)
                                            {{$orders->tracking_msg}}

                                            @else
                                            <form action ="{{url('order/update-tracking-status/'.$orders->id)}}" method="POST">
                                                @csrf
                                                {{method_field('PUT')}}
                                                <div class = "input-group mb-3">
                                                    <select name = "tracking_msg" class="custom-select" required id="inputGroupSelect02">
                                                        <option value = ""> -- Select --</option>
                                                        <option value = "Pending" {{$orders->tracking_msg == "Pending" ? 'selected':''}}>Pending </option>
                                                        <option value = "Packed" {{$orders->tracking_msg == "Packed" ? 'selected':''}}>Packed </option>
                                                        <option value = "Shipped" {{$orders->tracking_msg == "Shipped" ? 'selected':''}}> Shipped</option>
                                                        <option value = "Delievery" {{$orders->tracking_msg == "Delievery" ? 'selected':''}}>Delievery </option>
                                                    </select>
                                                    <div class = "input-group-append">
                                                        <button type = "submit" class = "input-group-text bg-info text-white" for="inputGroupSelect02">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                {{-- Current status update --}}

                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h5>Cancel Order </h5>
                                            <hr>
                                            @if($orders->order_status == 1)
                                            Order - Completed
                                            @elseif ($orders->order_status == 2)
                                            {{$orders->cancel_reason}}

                                            @else
                                            <form action ="{{url('order/cancel-order/'.$orders->id)}}" method="POST">
                                                @csrf
                                                {{method_field('PUT')}}
                                                <div class = "input-group mb-3">
                                                    <select name = "cancel_reason" class="custom-select" required id="inputGroupSelect02">
                                                        <option value = ""> -- Select --</option>
                                                        <option value = "Customer Not Available" >Customer Not Available</option>
                                                        <option value = "Product Damage" >Product Damage</option></option>
                                                        <option value = "No response" > No response</option>
                                                        <option value = "Delayed" > Delayed</option>
                                                    </select>
                                                    <div class = "input-group-append">
                                                        <button type = "submit" class = "input-group-text bg-info text-white" for="inputGroupSelect02">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                 {{-- payment status update --}}

                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h5>Complete Order </h5>
                                            <hr>
                                            @if($orders->order_status == 0)
                                          <a href="javascript:void(0)" data-toggle="modal" data-target="#CompleteORderModal"
                                          class="badge badge-pill badge-primary px-3 py-2">Proceed to finish this Order </a>
                                          @elseif ($orders->order_status == 1)
                                            Order  Completed
                                          @elseif ($orders->order_status == 2)
                                            Order Canceled. ! So not allowed to complete this order
                                            @else
                                            Nothing
                                          @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

























































                                @endsection







