<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
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

<link  rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link  rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />

<!-- alertify CSS -->
<link rel="stylesheet" href="{{asset('assets/css/alertify.min.css')}}"/>

<!-- Autocomplete CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
    .ul-widget{
        z-index: 2024;
    }
</style>


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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"> </script>
<!-- Autocomplete-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
      $(document).ready(function(){
          src = "{{route('searchproductajax')}}";
        $( "#search_text" ).autocomplete({
        source: function(request, response){
          $.ajax({
              url:src,
              data: {
                  term: request.term
              },
              dataType: "json",
              success: function(data){
                  response(data);
              }
          });
      },
      minLength: 1,
    });
    $(document).on('click','.ui-menu-item',function(){
        $('#search-form').submit();
      });
    });

  </script>

  <!-- Custom JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/custom.js') }}"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

<!-- alertify JavaScript -->
<script src="{{asset('assets/js/alertify.min.js')}}"></script>
<script>
    @error('email')
    $('#LoginModal').modal('show');
    @enderror
    @if (session('status'))
    alertify.set('notifier','position','top-right');
     alertify.success("{{session('status')}}");
    @endif
</script>
@yield('script')
</body>
</html>





