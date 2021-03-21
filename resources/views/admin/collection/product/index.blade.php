@extends ('layouts.admin')

@section('content')


<div class="container-fluid mt-5">
        <div class="row ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body mt-3">
                    <h6 class= "mb-0">
                        Collection / Products
        <a href="{{url('product-deleted-records')}}" class="badge bg-primary p-2 text-white float-right ml-2 "> Deleted Records</a>
         <a href="{{url('add-products')}}"  class="badge bg-primary p-2 text-white float-right "> ADD Products</a>
    </h6>
</div></div></div></div>
<div class="row mt-3
">
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
                <th> Sub Category Name</th>

                <th> Image</th>
                <th> Show/Hide</th>
                <th> Action</th>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->subcategory->name}}</td>
                <td>
                    <img src="{{ asset('uploads/products/'.$item->image)}}" alt="Product Image" width="50px"/>
                 </td>
                 <td>
                    <input type="checkbox" {{ $item->status == "1" ? 'checked' : ' '}}>
                </td>


                    <td>
                    <a href = "{{url('edit-products/'.$item->id)}}" class="badge btn btn-primary"> EDIT </a>
                    <a href = "{{url('product-delete/'.$item->id)}}" class="badge btn btn-danger"> Delete </a>
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
