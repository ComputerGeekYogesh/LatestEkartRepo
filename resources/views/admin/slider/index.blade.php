@extends ('layouts.admin')

@section('content')

<div class="row ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body mt-3">
                <h3 class= "mb-0">
                    Slider
                    <a href = "{{url('add-slider')}}" class="badge bg-primary p-2 text-white float-right ml-2"> Add Slider</a>
</h3>
</div>
</div>
</div>
</div>


<div class="container-fluid ">
    <div class="row mt-3
    ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th> ID</th>
                    <th>Heading </th>
                    <th> Image</th>
              
                    <th> Status</th>
                    <th> Edit</th>
                </thead>
                <tbody>
                    @foreach ($slider as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                    <td>{{ $item->heading}}</td>
                    <td> <img src="{{$item->image}}" width="50px"/></td>
                    <td>
                    @if( $item->status =='1')
                    hidden
                    @else
                    visible
                    @endif 
                    </td>
                    <td>
                        <a href = "{{url('edit-slider/'.$item->id)}}" class="btn btn-success btn-sm"> Edit</a>

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
