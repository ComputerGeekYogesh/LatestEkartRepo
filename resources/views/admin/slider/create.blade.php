@extends ('layouts.admin')

@section('content')

<div class="row ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body mt-3">
                <h3 class= "mb-0">
                    Add Slider
                    <a href = "{{url('home-slider')}}" class=" btn btn-danger btn-sm float-right "> BACK</a>

</h3>
</div>
</div></div></div>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card ">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                       {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
              @endif
                    <form action="{{url('store-slider')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                            <div class="form-group">
                                <label for="">Heading</label>
                                <input type ="text" name="heading" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type ="text" name="link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Link Name</label>
                                <input type ="text" name="link_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Slider Image Upload</label>
                                <input type ="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type ="checkbox" name="status">  0= visible, 1= hidden
                            </div>
                            <div class="form-group">
                               <button type="submit" class = "btn btn-primary">Submit</button>
                            </div>



                </div>
                    </form>






















@endsection
