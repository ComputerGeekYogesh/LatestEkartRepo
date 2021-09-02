@extends ('layouts.frontend')

@section ('title')
New Arrivals
@endsection

@section ('content')

<section class="py-5">
<div class="container">
<div class="row">
          <div class="col-md-12 mb-4">
            <h4 class="border-bottom">New Arrivals
            </h4>
          </div>
          @foreach ($products as $newarrivalitems )
            {{-- my-3 to give seperation between the cards we do that  --}}
          <div class="col-md-3 my-3">
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
                @endforeach
                 </div>  </div>       </div>

 </section>

@endsection
