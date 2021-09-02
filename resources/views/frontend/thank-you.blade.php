@extends ('layouts.frontend')

@section ('title')
Thank you
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
<div class="container">
<div class="row">
    <div class="col-md-12 mycard py-5 text-center card card-body">
        <div class="mycards">
            <h4>Thank You For Shopping</h4>
            <h3>Your Order has been placed Successfully!!</h3>
            {{-- @if(session('status'))
            <h3>{{session('status')}}</h3>
            @endif --}}
        </div>
    </div>
</div>
</div>





@endsection
