@extends ('layouts.frontend')

@section ('title')
 Collection - Category
@endsection

@section ('content')

<div class="card mb-5 card py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <label for="">Collection / {{$group->name}}</label>


            </div>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            @foreach ($category as $cate_item)
            <div class="col-md-3 mb-4">
                <a href ="{{url('collection/'.$cate_item->group->url.'/'.$cate_item->url)}}" class="text-center">
                <div class="card">
                    <img src="{{asset('uploads/categoryimage/'.$cate_item->image)}}" width="100" height="150"  class="w-100" alt="">
                    <div class="card-body bg-light">

                        <h4>hie: {{$cate_item->name}}</h4>
                     </a>
                    </div>
                </div>
            </div>

            @endforeach


</div>
</div>
</div>

</div>

@endsection
