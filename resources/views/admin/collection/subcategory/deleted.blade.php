@extends ('layouts.admin')

@section('content')

<div class="container-fluid ">
    <div class="row ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <h6 class= "mb-0">
                    Collection /  Subcategory Deleted Records

</h6>
</div></div></div></div>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                @if (session('status'))
                  <h6> {{ session('status') }} </h6>
            @endif
        <table class="table table-striped table-bordered">
            <thead>
                <th> ID</th>
                <th> Name</th>
                <th> Category Name</th>

                <th> Image</th>
                <th> Show/Hide</th>
                <th> Action</th>
            </thead>
            <tbody>
                @foreach ($scategory as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->category->name}}</td>
                <td>
                    <input type="checkbox" {{ $item->status == "1" ? 'checked' : ' '}}>
                </td>
                <td>
                    <img src="{{ asset('uploads/subcategory/'.$item->image)}}" width="50px"/>
                 </td>
                <td>


                    <a href = "{{url('subcategory-re-store/'.$item->id)}}" class="badge py-2 px-2 btn-danger"> Re-Store</a>
                </td>
            </tr>


            @endforeach

        </tbody>
    </table>

</div>
</div>
</div>
</div>
</div>

</div>
@endsection







</div>
