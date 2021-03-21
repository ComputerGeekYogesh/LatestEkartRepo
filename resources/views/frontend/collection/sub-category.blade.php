@extends ('layouts.frontend')

@section ('title')
 Collection - Category - SubCategory
@endsection

@section ('content')

<div class="card mb-5 card py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <label for="">Collection /  {{$category->group->name}} / {{$category->name}}</label>


            </div>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
           @foreach ($scategory as $subcate_item)
            <div class="col-md-3 mb-4">
                <a href ="{{url('collection/'.$subcate_item->category->group->url.'/'.$subcate_item->category->url.'/'.$subcate_item->url)}}" class="text-center">
                <div class="card">
                    <img src="{{asset('uploads/subcategory/'.$subcate_item->image)}}" width="100" height="150"  class="w-100" alt="">
                    <div class="card-body bg-light">

                        <h4>hie: {{$subcate_item->name}}</h4>
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


