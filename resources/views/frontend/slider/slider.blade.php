<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">

@php $i = 1; @endphp

@foreach($slider as $s)
<div class="carousel-item {{ $i == '1' ? 'active':''}}">
@php $i++; @endphp
<img src={{$s->image}} class="d-block w-100" alt="...">
  <div class="carousel-caption d-none d-md-block">
    <h5>{{$s->heading}}</h5>
    <p>{{$s->description}}</p>
     <a href="{{$s->link}}">{{$s->link_name}}</a>
  </div> </div>
@endforeach
  
</div>
 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>