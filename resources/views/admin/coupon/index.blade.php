@extends ('layouts.admin')

@section('content')


<!-- Modal -->
<div class="modal fade" id="CouponModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('coupon-store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Offer Name</label>
                        <input type ="text" name="offer_name" class="form-control" placeholder="Enter Offer Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Products (Optional)</label>
                        <select name="product_id" class="form-control select2-products">
                            <option value = ""  > Select Product </option>
                            @foreach ($products as $proditem)
                            <option value = "{{$proditem->id}}">{{$proditem->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Coupon Code</label>
                        <input type ="text" name="coupon_code"  class="form-control" placeholder="Enter Coupon Code" required>
                    </div>
                </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Coupon Limit</label>
                                <input type ="text" name="coupon_limit" class="form-control" placeholder="Enter Coupon Limit" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Coupon Type</label>
                                <select name="coupon_type" class="form-control" required>
                                    <option value = "" disabled selected hidden> Select your Coupon Type  </option>
                                    <option value = "1"> Percentage </option>
                                    <option value = "2"> Amount  </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Coupon Price</label>
                                <input type ="number" name="coupon_price" class="form-control" placeholder="Enter Coupon Price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Start Date Time</label>
                                <input type ="datetime-local" name="start_datetime"  class="form-control" placeholder="Enter URL" required>
                            </div>
                        </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""> End Date Time</label>
                                        <input type ="datetime-local" name="end_datetime" class="form-control" placeholder="Enter Priority" required>
                                    </div>
                                </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Status</label>
                                <input type ="checkbox" name="status"  > (0=Active, 1=Blocked)
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Visibility Status</label>
                                <input type ="checkbox" name="visibility_status"  > (0=show, 1=hide)
                            </div>
                        </div>
                    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Save </button>
        </div>
        </form>
      </div>
    </div>
  </div>

  {{-- End modal --}}

        <div class="row ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body mt-3">
                    <h3 class= "mb-0">
                        Coupon Code Page
                        <a href = "" class="badge bg-primary p-2 text-white float-right ml-2" data-bs-toggle="modal" data-bs-target="#CouponModal"> Add Coupon</a>
    </h3>
</div></div></div></div>
<div class="container-fluid ">
<div class="row mt-3
">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                @if (session('status'))

                <div class="alert alert-success" role="alert">
                   {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
          @endif
        <table class="table table-striped table-bordered">
            <thead>
                <th> ID</th>
                <th> Offer</th>
                {{-- <th> Product</th> --}}
                <th> Coupon Code</th>
                <th> Expiry DateTime</th>
                <th> Status</th>
                <th> Action</th>
            </thead>

            <tbody>
                @foreach ($coupon as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                <td>{{ $item->offer_name}}</td>
                

                {{-- <td> {{$item->products->name}}</td> --}}
                                     {{-- OR
               <td> {{"$proditem->id" == "$item->product_id" ? $proditem->name:''}} </td> --}}


                <td>{{ $item->coupon_code}}</td>
                <td>{{ $item->end_datetime}}</td>
                <td>
                    @if($item->status=="0")
                    <label class="badge badge-pill badge-success py-2">  Active   </label>
                     @elseif($item->status=="1")
                     <label class="badge badge-pill badge-danger py-2"> Disabled   </label>
                     @endif
                </td>

                <td>
                    <a href = "{{url('edit-coupon/'.$item->id)}}" class="btn btn-success btn-sm"> EDIT </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div>
</div>
</div>
</div>

</div>


@endsection
