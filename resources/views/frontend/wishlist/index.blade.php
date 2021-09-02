@extends ('layouts.frontend')

@section ('title')
Wishlist
@endsection


@section('content')
<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5 class="text-white"><a href="/" class="text-white">Home</a> › Wishlist</h5>
            </div>
        </div>
    </div>
</section>

<section class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wishlist-header border p-2">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-0 font-weight-bold">Product Details</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="mb-0 font-weight-bold">Price</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="mb-0 font-weight-bold">Add to cart</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="mb-0 font-weight-bold">Remove</h6>
                    </div>
                </div>
            </div>
            @foreach ( $wishlist as $item)
            @if (isset($item->products))
            <div class="product_data">
            <div class="wishlist-content mt-3">
                <input type = "hidden" class="product_id" value="{{ $item->products->id}}">
                <input type = "hidden" class="qty-input form-control" value="1" min="1" max="100"/>
                <input type="hidden" class="wishlist_id" value="{{$item->id}}">
                <div class="card">
                    <div class=" card-body">
                <div class="row">
                    <div class="col-md-1 my-auto">
                        <img src="{{ asset('uploads/products/'.$item->products->image) }}" class="w-100" alt="Image">
                    </div>
                    <div class="col-md-5 my-auto">
                        <h6 >{{$item->products->name}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6 >{{$item->products->offer_price}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <a href="" class="btn btn-primary btn-sm add-to-cart-btn">Add to cart</a>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button type="button" class="btn btn-danger btn-sm wishlist-remove-btn">Remove</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
</div>
</div>
    </section>
@endsection
