<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
  @yield('title')| ekart- admin panel
  </title>

<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>

<!-- Bootstrap core css -->
<link
  href="{{asset('assets/css/bootstrap.min.css') }}"
  rel="stylesheet"
/>

<!-- Material design bootstrap-->
<link
  href="{{asset('assets/css/mdb.min.css') }}"
  rel="stylesheet"
/>


<!-- custom style -->
<link
  href="{{asset('assets/css/style.css') }}"
  rel="stylesheet"
/>


<!-- custom style data tables-->
<link
  href="{{asset('assets/css/addons/datatables.min.css') }}"
  rel="stylesheet"
/>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<style>
     .sidebar-fixed{height:100vh;width:270px;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);z-index:1050;background-color:#fff;padding:0 1.5rem 1.5rem}.sidebar-fixed .list-group .active{-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);-webkit-border-radius:5px;border-radius:5px}.sidebar-fixed .logo-wrapper{padding:2.5rem}.sidebar-fixed .logo-wrapper img{max-height:50px}@media (min-width:1200px){.navbar,.page-footer,main{padding-left:270px}}@media (max-width:1199.98px){.sidebar-fixed{display:none}}

     .container-for-admin{
  background-color: #eee!important;
}

.map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}

    /* @media screen and (min-width:1200px){
        .col-md-12{
            width:100%;
        }
        .card{
            width:100%;
        }
        .card-body{
            width:100%;
        }
    } */

</style>

</head>
<body>
    <div class="container-for-admin">
<!--Main Navigation-->
<header>
    @include('layouts.inc.adminnavbar')
@include('layouts.inc.adminsidebar')
</header>
<!--Main Navigation-->

<main>
<!--Main layout-->
<!--main class="pt-5 mx-lg-5" bc hai ya line-->
@yield ('content')
</main>
@include('layouts.inc.adminfooter')
</div>





<!---- jquery script --->
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js') }} "></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('assets/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/mdb.min.js') }}"></script>

    <!-- Datatable JS -->
   <script type="text/javascript" src="{{asset('assets/js/addons/datatables.min.js') }}"></script>

   <!-- include summernote js -->
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

@yield('script')
</body>
</html>





