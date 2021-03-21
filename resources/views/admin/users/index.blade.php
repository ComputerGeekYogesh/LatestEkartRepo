@extends ('layouts.admin')

@section('content')

<div class="container-fluid mt-5 ">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between mt-3">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
            <span>/</span>
            <span>Registered Users</span>
          </h4>


        </div>

      </div>
                    <!----heading------>

         <div class="row">
        <div class = "col-md-6">
            <form action = "{{url('registered-user')}}" method="GET">
                <div class="row">
                    <div class = "col-md-8">
                        <div class= "form-group">
                            <select name = "roles" class= "form-control">
                                @if(isset($_GET['roles']))
                                <option value="{{ $_GET['roles']}}">{{ $_GET['roles']}} </option>
                                <option value="">Default </option>
                                <option value="admin">Admin </option>
                                <option value="vendor">Vendor </option>
                                @else
                                <option value="">Default </option>
                                <option value="admin">Admin </option>
                                <option value="vendor">Vendor </option>
                                @endif
                            </select>
                        </div>
                        </div>
                        <div class = "col-md-4">
                            <button type = "submit" class="btn btn-primary py-2">Filter </button>
                        </div>
                    </div>



            </form>




        </div>

            <div class = "col-md-6">
                <div class= "card p-2">
                <h5>
                    @php $u_total = "0"; @endphp
                    @foreach($users as $item)
                    @php
                     if ($item->isUserOnline())
                    {
                        $u_total = $u_total + 1;
                    }
                    @endphp
                    @endforeach
                    Total User Online:{{$u_total}}
                </h5>
            </div> </div>
             <div class = "col-md-12">
             <div class = "card">
                <div class = "card-body">

                    <table id = "datatable1" class = "table table-bordered table-striped">

                            <thead>
                          <tr>
                            <th> Id  </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Role  </th>
                            <th> online/offline  </th>
                            <th> IsBan/unBan  </th>
                            <th> Action  </th>

                          </tr>
                        </thead>
 <tbody>
     @foreach($users as $item)
<tr>
<td> {{$item->id}} </td>
<td> {{$item->name}} </td>
<td> {{$item->email}} </td>
<td> {{$item->role_as}} </td>
<td>
    @if($item->isUseronline())
    <label class = "py-2 px-3 badge btn-success"> Online</label>
    @else
    <label class = "py-2 px-3 badge btn-warning"> Offline</label>
    @endif
</td>
<td>
    @if($item->isban=="0")
   <label class="py-2 px-3 badge btn-primary">   Not Banned    </label>
    @elseif($item->isban=="1")
    <label class="py-2 px-3 badge btn-danger">    Banned    </label>

    @endif

</td>
<td>
    <a href = "{{url('role-edit/'.$item->id)}}" class="badge badge-pill btn-primary px-3 py-2"> EDIT </a> <br>
    <a href = "" class="badge badge-pill btn-danger px-3 py-2"> Delete </a>
</td>
</tr>
@endforeach
 </tbody>

                        </table>
                       {{--<div class="float-right" {{$users->links()}} </div>--}}
                       <style>
                        .w-5{
                            display:none;
                        }
                    </style>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')
<script>
    $(document).ready( function () {
    $('#datatable1').DataTable();
} );
</script>

@endsection
