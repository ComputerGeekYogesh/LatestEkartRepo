@extends ('layouts.frontend')

@section ('title')
Home
@endsection

@section ('content')
@include('frontend.slider.slider')

<section class="py-5">
<div class="container">
<div class="row">
          <div class="col-md-12 mb-2">
            <h4 class="border-bottom">New Arrivals
                <a href="{{url('new-arrivals')}}" class="primary float-right ">View All</a>
            </h4>
          </div>
          <div class="owl-carousel owl-theme">

          @foreach ($products as $newarrivalitems )
          {{-- <div class="item mt-3"> --}}
          {{-- <div class="col-md-3"> --}}
        <div class="item my-3">
          <div class="card">
            <img src="{{asset('uploads/products/'.$newarrivalitems->image)}}" class="w-100" alt="Red Mi">
            <div class="card-body text-center">
                <h5 class="font-weight-bold text-truncate">
                 {{$newarrivalitems->name}}
                  </h5>
                  <h6 class="">
                    <span class="font-italic mr-2"> <s>Rs:  {{$newarrivalitems->original_price}} </s></span>
                    <span class="font-weight-bold">Rs:   {{$newarrivalitems->offer_price}}</span>
                  </h6>
                  <a href="{{url('collection/'.$newarrivalitems->subcategory->category->group->url.'/'.$newarrivalitems->subcategory->category->url.'/'.$newarrivalitems->subcategory->url.'/'.$newarrivalitems->url)}}" class="btn btn-outline-primary btn-block">
                   View Detail
                  </a>
                </div>       </div>  </div>
                @endforeach    </div>
                 </div>  </div>       </div>

 </section>

@endsection


@section('script')
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    //autoplay: true,
    //autoplayTimeout: 1000,
    //stagePadding: 50,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>


@endsection

