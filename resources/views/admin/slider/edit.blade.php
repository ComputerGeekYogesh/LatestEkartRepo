@extends ('layouts.admin')

@section('content')

<div class="row ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body mt-3">
                <h3 class= "mb-0">
                    Edit Slider
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
                    <form action="{{url('update-slider/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                            <div class="form-group">
                                <label for="">Heading</label>
                                <input type ="text" name="heading" value="{{$slider->heading}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control"> {{$slider->description}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type ="text" name="link" value="{{$slider->link}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Link Name</label>
                                <input type ="text" name="link_name" value="{{$slider->link_name}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Slider Image Upload</label>
                                <input type ="file" name="image" class="form-control">
                                  <img src="{{ $slider->image}}" width="60px"/>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type ="checkbox" name="status" {{$slider->status == '1' ? 'checked':" "}}>  0= visible, 1= hidden
                            </div>
                            <div class="form-group">
                               <button type="submit" class = "btn btn-primary">Submit</button>
                            </div>



                </div>
                    </form>






















@endsection
