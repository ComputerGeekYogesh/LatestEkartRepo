

 <!-- Bootstrap Bundle with Popper for dropdown list showing-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 <!-- Sidebar -->
 <div class="sidebar-fixed position-fixed">

<a class="logo-wrapper waves-effect">
  <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
</a>

<div class="list-group list-group-flush">
  <a href="#" class="list-group-item active waves-effect">
    <i class="fa fa-pie-chart mr-3"></i>Dashboard
  </a>
  <a href="{{url('/home-slider')}}" class="list-group-item list-group-item-action waves-effect">
    <i class="fa fa-table mr-3"></i>Slider</a>
  <a href="{{url('group')}}" class="list-group-item list-group-item-action waves-effect">
    <i class="fa fa-table mr-3"></i>Group</a>
  <a href="{{url('category')}}" class="list-group-item list-group-item-action waves-effect">
    <i class="fa fa-map mr-3"></i>Category</a>
    <a href="{{url('subcategory')}}" class="list-group-item list-group-item-action waves-effect">
        <i class="fa fa-map mr-3"></i>Sub-Category</a>
        <a href="{{url('product')}}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>Product</a>
            <a href="{{url('orders')}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-map mr-3"></i>Orders</a>
                <a href="{{url('coupons')}}" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Coupon</a>

    {{-- <a href="#" class="list-group-item list-group-item-action waves-effect dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user mr-3"></i>Collection </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{url('group')}}">Group</a>
            <a class="dropdown-item" href="{{url('category')}}">Category </a>
            <a class="dropdown-item" href="{{url('subcategory')}}">Sub-Category</a>
            <a class="dropdown-item" href="{{url('product')}}">Product (items) </a>
        </div> --}}

  <a href="{{url('registered-user')}}" class="list-group-item list-group-item-action waves-effect">
    <i class="fa fa-users mr-3"></i>Registered User</a>
</div>

</div>
<!-- Sidebar -->
