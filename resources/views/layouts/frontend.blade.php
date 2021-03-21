<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
  @yield('title')| ekart
  </title>
  <meta name="keywords" content="@yield('meta_desc')">
  <meta name="author" content="@yield('meta_tags')">
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


</head>
<body>
@include('layouts.inc.front-navbar')
<main>
@yield ('content')
</main>
@include('layouts.inc.front-footer')

<!---- jquery script --->
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js') }} "></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('assets/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/mdb.min.js') }}"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>


</body>
</html>





