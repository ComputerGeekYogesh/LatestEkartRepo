
@extends ('layouts.admin')

@section('content')

        <div class="row">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-body mt-3">
                    <h6 class= "mb-0">
                        Collection / Group
        <a href="{{url('group-deleted-records')}}" class="badge bg-primary p-2 text-white float-right ml-2 "> Deleted Group</a>
         <a href="{{url('group-add')}}" class="badge bg-primary p-2 text-white float-right "> ADD Group</a>
    </h6>
</div></div></div></div>
<div class="container-fluid">
    <div class="row mt-3
    ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    @if (session('status'))

                    <div class="alert alert-success" role="alert">
                       {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
              @endif
            <table class="table table-striped table-bordered">
                <thead>
                    <th> ID</th>
                    <th> Name</th>
                    <th> Description</th>
                    <th> Show/Hide</th>
                    <th> Action</th>
                </thead>
                <tbody>
                    @foreach ($group as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->description}}</td>
                    <td>
                        <input type="checkbox" {{ $item->status == "1" ? 'checked' : ' '}}>
                    </td>
                    <td>

                        <a href = "{{url('group-edit/'.$item->id)}}" class="badge btn-primary"> EDIT </a>
                        <a href = "{{url('group-delete/'.$item->id)}}" class="badge btn-danger"> Delete </a>
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
