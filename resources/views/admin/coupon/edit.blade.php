@extends ('layouts.admin')

@section('content')

<div class="container-fluid ">
    <div class="row ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <h6 class= "mb-0">
                     Edit Coupon Code
    <a href="{{url('coupons')}}" class="badge bg-danger p-2 text-white float-right  "> BACK</a>
</h6>
</div></div></div></div>

<div class="row mt-3
">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <form action="{{url('update-coupon/'.$coupon->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="">Offer Name</label>
                                <input type ="text" name="offer_name" value="{{$coupon->offer_name}}"   class="form-control" placeholder="Enter Offer Name">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label>Products (Optional)</label>
                                <select name="product_id" class="form-control select2-products">

                                    <option value="0">Select Product</option>
                                    @foreach ($products as $proditem)
                                    <option value = "{{$proditem->id}}" {{"$proditem->id" == "$coupon->product_id" ? 'selected':''}}>
                                        {{$proditem->name}}
                                    </option>
                                    @endforeach

                                         {{-- OR we can also do this with relationship way --}}

                                    {{-- <option value = "{{$coupon->product_id}}"> {{$coupon->products->name}}</option>
                                    @foreach ($products as $proditem)
                                    <option value = "{{$proditem->id}}">{{$proditem->name}} </option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Coupon Code</label>
                                <input type ="text" name="coupon_code" value="{{$coupon->coupon_code}}"    class="form-control" placeholder="Enter Coupon Code" required>
                            </div>
                        </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""> Coupon Limit</label>
                                        <input type ="number" name="coupon_limit" value="{{$coupon->coupon_limit}}"   class="form-control" placeholder="Enter Coupon Limit" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Coupon Type</label>
                                        <select name="coupon_type" class="form-control" required >
                                            <option value = ""  disabled hidden selected > Select your Coupon Type  </option>
                                            <option value = "1" {{ "$coupon->coupon_type" == 1 ? 'selected':''}}  > Percentage </option>
                                            <option value = "2" {{"$coupon->coupon_type" == 2 ? 'selected':''}} > Amount  </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Coupon Price</label>
                                        <input type ="number" name="coupon_price" value="{{$coupon->coupon_price}}"   class="form-control" placeholder="Enter Coupon Price" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Start Date Time</label>
                                        <input type ="datetime-local" name="start_datetime" value="{{date('Y-m-d\TH:i', strtotime($coupon->start_datetime))}}"    class="form-control" >
                                    </div>
                                </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> End Date Time</label>
                                                <input type ="datetime-local" name="end_datetime"  value="{{date('Y-m-d\TH:i', strtotime($coupon->end_datetime))}}"   class="form-control">
                                            </div>
                                        </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""> Status</label>
                                        <input type ="checkbox" name="status" {{ $coupon->status == "1" ? 'checked' : ' '}}> (0=Active, 1=Blocked)
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Visibility Status</label>
                                        <input type ="checkbox" name="visibility_status" {{ $coupon->visibility_status == "1" ? 'checked' : ' '}}> (0=show, 1=hide)
                                    </div>
                                </div>
                            </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update </button>
                </div>
                </form>
              </div>
            </div>
          </div>
          @endsection
