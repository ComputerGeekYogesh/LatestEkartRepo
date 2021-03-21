@extends ('layouts.frontend')

@section ('title')
{{$products->meta_title}}
@endsection

@section ('meta_desc')
{{$products->meta_description}}
@endsection

@section ('meta_tags')
{{$products->meta_keyword}}
@endsection

@section ('content')

<section class ="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="border">
                                    <img src="{{asset('uploads/products/'.$products->image)}}" class="w-100"alt="">
                                </div></div>
                                <div class="col-md-7">
                                    <div class="py-2">
                                        <small class= "text-gray mb-0">collection >
                                            {{$products->subcategory->category->group->name}} >
                                            {{$products->subcategory->category->name}} >
                                            {{$products->subcategory->name}} >
                                            {{$products->name}}
                                        </small>
                            </div>
                            <div class="product-heading py-2 border-top">
                                <h5 class="mb-0 font-weight-bold">  {{$products->name}}</h5>
                        </div>
                        <div class="py-2">
                            <small> Rating: @for($i=1; $i<=5; $i++) <i class="fa fa-star text-warning"></i> @endfor</small>
                        <small class="font-italic badge badge-primary ml-3 px-2">{{$products->sale_tag}}</small>
                    </div>
                    <div class="product-price">
                        <h5>
                            <span class="offer-price">Rs: {{number_format($products->offer_price)}}</span>
                            <span class="selling-price"><s>Rs: {{number_format($products->original_price)}} </s></span>
                        </h5>

                </div>
                <div class="py-3">
                    <div class="row">
                        <div class="col-md-2 col-3">
                            <input type ="number" class="qty-input form-control" value="1" min="1" max="100"/>
                        </div>
                        <div class="col-md-6 col-6">
                            <button type ="button" class="add-to-cart btn btn-danger m-0 py-2 px-3">Add to Cart</button>
                        </div>
                </div> </div> 
                <div class="product-small-description py-2 border-top">
                    {!! $products->small_description !!}
                  </div>
                 </div>
                  <div class="col-md-12">
                  <div class="product-highlights py-3 border-top">
                      <div class= "card">
                        <div class= "card-header">
                            <h6 class="highlight-heading mb-0 fony-weight-bold">{{$products->p_highlight_heading}} </h6>
                        </div>
                            <div class= "card-body">
                                {!! $products->p_highlight !!}
                      </div>   </div> </div>
                      <div class="product-highlights py-3 border-top">
                        <div class= "card">
                          <div class= "card-header">
                              <h6 class="highlight-heading mb-0 fony-weight-bold">{{$products->p_description_heading}} </h6>
                          </div>
                              <div class= "card-body">
                                  {!! $products->p_description !!}
                        </div>   </div> </div>
                        <div class="product-highlights py-3 border-top">
                            <div class= "card">
                              <div class= "card-header">
                                  <h6 class="highlight-heading mb-0 fony-weight-bold">{{$products->p_details_heading}} </h6>
                              </div>
                                  <div class= "card-body">
                                      {!! $products->p_details !!}
                            </div>   </div> </div>  </div>   </div>













</section>
@endsection
