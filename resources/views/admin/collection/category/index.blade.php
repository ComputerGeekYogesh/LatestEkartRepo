@extends ('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
        <div class="row ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body mt-3">
                    <h6 class= "mb-0">
                        Collection / Category
        <a href="{{url('category-deleted-records')}}" class="badge bg-primary p-2 text-white float-right ml-2 "> Deleted Records</a>
         <a href="{{url('category-add')}}" class="badge bg-primary p-2 text-white float-right "> ADD Category</a>
    </h6>
</div></div></div></div>
<div class="row mt-3
">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <th> ID</th>
                <th> Name</th>
                <th> Group Name</th>

                <th> Image</th>
                <th> Icon</th>
                <th> Show/Hide</th>
                <th> Action</th>
            </thead>
            <tbody>
                @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->group->name}}</td>  {{-- group->name --means call to group function name attributes--}}
                <td>
                   <img src="{{ asset('uploads/categoryimage/'.$item->image)}}" width="50px"/>
                </td>
                <td>
                    <img src="{{ asset('uploads/categoryicon/'.$item->icon)}}" width="50px"/>
                 </td>
                   {{-- <td>{{ $item->description}}</td>
                <td>{{ $item->description}}</td>--}}
                <td>
                    <input type="checkbox" {{ $item->status == "1" ? 'checked' : ' '}}>
                </td>
                <td>

                    <a href = "{{url('category-edit/'.$item->id)}}" class="badge btn-primary"> EDIT </a>
                    <a href = "{{url('category-delete/'.$item->id)}}" class="badge btn-danger"> Delete </a>
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
