@extends ('layouts.admin')

@section('content')

<div class="container-fluid mt-5">
    <div class="row ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <h6 class= "mb-0">
                    Collection / Edit-Sub-Category
    <a href="{{url('subcategory')}}" class="badge bg-danger p-2 text-white float-right  "> BACK</a>
</h6>
</div></div></div></div>

<div class="row mt-3
">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">

                <form action="{{url('sub-category-update/'.$scategory->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category ID (Name)</label>
                                <select name="category_id" class="form-control">
                                    <option value = "{{$scategory->category_id}}"> {{$scategory->category->name}}</option>

                                    @foreach ($category as $cateitem)
                                    <option value = "{{$cateitem->id}}">{{$cateitem->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type ="text" name="name" value="{{$scategory->name}}"      class="form-control" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Custom URL (Slug)</label>
                                <input type ="text" name="url" value="{{$scategory->url}}" class="form-control" placeholder="Enter URL" required>
                            </div>
                        </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""> Description</label>
                                        <textarea rows="4" name= "description" class="form-control" placeholder="Enter Description" >{{$scategory->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type ="file" name="image" class="form-control" >
                                        <img src="{{ asset('uploads/subcategory/'.$scategory->image)}}" width="100px"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Priority</label>
                                        <input type ="number" name="priority"  value="{{$scategory->priority}}"  class="form-control" placeholder="Enter Priority">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Show / Hide</label>
                                        <input type ="checkbox" name="status" {{ $scategory->status == "1" ? 'checked' : ' '}}>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update </button>
                                </diV>
                            </div>



            </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        </div>
        @endsection
