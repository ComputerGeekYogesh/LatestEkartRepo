@extends ('layouts.admin')

@section('content')

        <div class="row ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body mt-3">
                    <h3 class= "mb-0">
                        Orders
    </h3>
</div></div></div></div>


<div class="container-fluid ">
<div class="row mt-3
">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <th> ID</th>
                <th>C-Name </th>
                <th> Phone</th>
                <th> Tracking No</th>
                <th> Order Status</th>
                <th> Action</th>
                <th> Proceed</th>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                <td>{{ $item->users->name.''.$item->users->lname}}</td>
                <td>{{ $item->users->phone}}</td>
                <td>{{ $item->tracking_no}}</td>
                <td>
                    @if ($item->order_status == 0)
                    Pending
                    @elseif ($item->order_status == 1)
                    Completed
                    @elseif ($item->order_status == 2)
                    Cancel
                    @endif
                </td>
                <td>
                    <a href = "{{url('order-view/'.$item->id)}}" class="btn btn-primary btn-sm"> View</a>

                </td>
                <td>
                    <a href = "{{url('order-proceed/'.$item->id)}}" class="btn btn-success btn-sm"> Proceed</a>

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
