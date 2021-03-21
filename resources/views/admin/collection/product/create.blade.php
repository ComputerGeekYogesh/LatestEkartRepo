@extends ('layouts.admin')

@section('content')

<div class="container-fluid mt-5">
    <div class="row ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <h6 class= "mb-0">
                    Collection / Add Products
    <a href="{{url('product')}}" class="badge bg-danger p-2 text-white float-right  "> BACK</a>
</h6>
</div></div></div></div>

<div class="row mt-3
">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                @if (session('status'))

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
          @endif
          <form action="{{url('store-products')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product" role="tab"> Product</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="description-tab" data-toggle="tab" href="#descriptions" role="tab"> Description</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="seo-tab" data-toggle="tab" href="#seo" role="tab"> SEO</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="status-tab" data-toggle="tab" href="#status" role="tab"> Product Status</a>
                </li>
            </ul>
            <div class="tab-content border p-3" id= "myTabContent">
                <div class="tab-pane fade show active" id="product" role="tabpanel">
                    <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type ="text" name="name" class="form-control" placeholder=" Product Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Sub-Category  (Eg: Brands)</label>
                            <select name="sub_category_id" class="form-control" required>
                                <option value = ""> Select Subcategory </option>

                                @foreach ($scategory as $scateitem)
                                <option value = "{{$scateitem->id}}">{{$scateitem->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Custom URL (Slug)</label>
                            <input type ="text" name="url" class="form-control" placeholder="Custom URL" required>
                        </div>
                    </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> Small Description</label>
                                    <textarea rows="4" name= "small_description" class="form-control" placeholder="Small Description about product"></textarea>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Product image</label>
                                    <input type ="file" name="prod_image" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Sale Tag</label>
                                    <input type ="number" name="sale_tag" class="form-control" placeholder="Sale Tag">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Original Price</label>
                                    <input type ="number" name="original_price" class="form-control" placeholder="Original Price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Offer Price</label>
                                    <input type ="number" name="offer_price" class="form-control" placeholder="Offer Price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type ="number" name="quantity" class="form-control" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Priority</label>
                                    <input type ="number" name="priority" class="form-control" placeholder="Priority">
                                </div>
                            </div>

                </div>
            </div>

                <div class="tab-pane fade " id="descriptions" role="tabpanel">
                    <div class="row mt-3 ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""> High Lights</label>
                                <input type ="text" name="p_highlight_heading" class="form-control" placeholder="High-Light Heading">
                                <textarea rows="4" name= "p_highlights" class="form-control" placeholder="High-Light Description"></textarea>
                            </div>
                        </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> Product Description</label>
                                    <input type ="text" name="description_heading" class="form-control" placeholder="Product Description">
                                    <textarea rows="4" name= "p_description" class="form-control" placeholder="Product Description"></textarea>
                                </div>
                            </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""> Product Details/Specification</label>
                                        <input type ="text" name="p_details_heading" class="form-control" placeholder="Product Details/Specification Heading">
                                        <textarea rows="4" name= "p_details" class="form-control" placeholder="Product Details/Specification"></textarea>
                                    </div>
                                </div>




                    </div>

                </div>

                <div class="tab-pane fade " id="seo" role="tabpanel">
                    <div class="row mt-3 ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> Meta Title</label>
                            <textarea rows="4" name= "meta_title" class="form-control" placeholder="High-Light Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> Meta Description</label>
                            <textarea rows="4" name= "meta_description" class="form-control" placeholder="Product Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> Meta keywords</label>
                            <textarea rows="4" name= "meta_keyword" class="form-control" placeholder="Product Details/Specification"></textarea>
                        </div>
                    </div>
                </div>
            </div>

                <div class="tab-pane fade " id="status" role="tabpanel">
                    <div class ="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">New Arrivals</label>
                                <input type ="checkbox" name="new_arrival" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Featured products</label>
                                <input type ="checkbox" name="featured_products" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Popular Products</label>
                                <input type ="checkbox" name="popular_products" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Offer Products</label>
                                <input type ="checkbox" name="offers_products" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Show Hide</label>
                                <input type ="checkbox" name="status" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>



        <div class="form-group mt-3 text-right">
            <button type="submit" class="btn btn-primary">SAVE </button>
            </diV>
        </form>











        </div>
        </div>
        </div>
        </div>

        </div>
        @endsection
