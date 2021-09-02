@extends ('layouts.frontend')

@section ('title')
 Collection - Category - SubCategory - Products
@endsection

@section ('content')

<div class="card mb-5 card py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <label class="mb-0">Collection /  {{$scategory->category->group->name}}  / {{$scategory->category->name}} / {{$scategory->name}}</label>


            </div>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">

        </div>


        <div class="col-md-3">
            <form action="{{URL::current()}}" method="GET">
            <div class ="card">
                <div class="card-header">
                    <h5>Brands
                        <button type="submit" class="btn btn-primary btn-sm float-right">Filter</button>
                    </h5>
                </div>
                    <div class="card-body">
                        @foreach ( $scategorylist as $itemcate)
                        @php
                        $checked = [];
                        if(isset($_GET['filterbrand']))
                        {
                            $checked = $_GET['filterbrand'];
                        }

                        @endphp

                        <div class="mb-1">
                            <input type="checkbox" name="filterbrand[]" value="{{$itemcate->name}}"
                            @if (in_array($itemcate->name, $checked )) checked @endif />
                            {{$itemcate->name}}
                        </div>
                        @endforeach
                </div>
            </div>
    </form>
    </div>

        <div class="col-md-9">
            <span class="font-weight-bold sort-font">Sort By</span>
            <a href ="{{URL::current()}}" class="sort-font">All </a>   {{--URL model fetches the current page url --}}
            <a href ="{{URL::current()."?sort=price_asc"}}" class="sort-font">Price - Low to High </a>
            <a href ="{{URL::current()."?sort=price_desc"}}" class="sort-font">Price - High to Low </a>
            <a href ="{{URL::current()."?sort=newest"}}" class="sort-font">Newest </a>
            <a href ="{{URL::current()."?sort=popularity"}}" class="sort-font">Popularity </a>
            <div class="row">
           @foreach ($products as $product_item)
            <div class="col-md-12  mt-2">
                <div class ="card product_data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="">
                                    <img src="{{asset('uploads/products/'.$product_item->image)}}" width="100" height="200" class="w-100"alt="">
                                </div>
                                <div class="wishlist-content">
                                    <input type="hidden" class="product_id" value="{{ $product_item->id }}">
                                   @guest
                                   <button type="button" data-toggle="modal" data-target="#LoginModal" class="btn btn-success my-3">
                                    <i class= "fa fa-heart"></i> Wishlist
                                   </button>
                                   @else
                                   <button type="button" class="add-to-wishlist-btn btn btn-success my-3">
                                    <i class= "fa fa-heart"></i>  Wishlist
                                   </button>

                                    @endguest
                                </div>
                            </div>
                            <div class="col-md-7 ">
                                <a href ="{{url('collection/'.$product_item->subcategory->category->group->url.'/'.$product_item->subcategory->category->url.'/'.$product_item->subcategory->url.'/'.$product_item->url)}}" >
                                <h5 class="mb-2">{{$product_item->name}}</h5>
                                    </a>
                                    <div class="">
                                        <h6 class="text-dark mb-0">{!!$product_item->p_highlight !!}</h6>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                <div class="text-right">
                                    <h6 class="font-italic text-dark badge badge-warning px-3 py-1">{{$product_item->sale_tag}}</h6>
                                    <h6 class="font-italic "><s>Rs: {{number_format($product_item->original_price)}}  </s></h6>
                                    <h6 class="font-italic font-weight-bold">Rs: {{number_format($product_item->offer_price)}}  </s></h6>
                                    </div>
                                    <div class="text-right">

                                        <div>
                                            <a href ="{{url('collection/'.$product_item->subcategory->category->group->url.'/'.$product_item->subcategory->category->url.'/'.$product_item->subcategory->url.'/'.$product_item->url)}}" class="btn btn-outline-primary py-1 px-2">
                                                View Details </a>
                                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            @endforeach

</div>
</div>


</div>

</div>
</div>

@endsection


