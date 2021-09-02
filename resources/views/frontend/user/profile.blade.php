@extends ('layouts.frontend')

@section ('title')
My Profile
@endsection

@section ('content')

<section class="py-5">
    <div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 > My Profile Page</h4>
                    <hr>
                    <form action="{{url('my-profile-update')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" value = "{{Auth::user()->name}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" value = "{{Auth::user()->last_name}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email id</label>
                            <input type="text" name="email" class="form-control" readonly value = "{{Auth::user()->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address 1 (f.no, Apt.no)</label>
                            <input type="text" name="address1"class="form-control" value = "{{Auth::user()->address1}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address 2 (Landmark,near by)</label>
                            <input type="text" name="address2" class="form-control" value = "{{Auth::user()->address2}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" name="city" class="form-control" value = "{{Auth::user()->city}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" name="state" class="form-control" value = "{{Auth::user()->state}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Pincode / Zipcode</label>
                            <input type="text" name="pincode"class="form-control" value = "{{Auth::user()->pincode}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value = "{{Auth::user()->phone}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Alternate Number</label>
                            <input type="text" name="alternate_phone" class="form-control" value = "{{Auth::user()->alternate_phone}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                           <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type = "file" name="image" class="form-control"> <br>
                       <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> {{--image issue--}}
                        </div>
                    </div>
                    </form>


                </div>

        </div>
    </div>
 </div>
  </div>
  </section>

    @endsection
