<div class="white scrolling-navbar sticky-top">
    <div class="container-fluid">
<div class="row">
<div class="col-md-12">


<!-- Navbar -->
<nav class="navbar  navbar-expand-lg">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
        <strong class="blue-text">eKart</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link waves-effect" href="#">Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="" target="_blank">Collections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="" target="_blank">New Arrivals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="" target="_blank">All Products</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect">
              <span class="badge red z-depth-1 mr-1"> 1 </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Cart </span>
            </a>
          </li>
          @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{url('my-profile')}}" class="dropdown-item">

                                        My Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </ul>

      </div>
    </nav>
    </div>
</div>


</div>

</div>

<div class="row">

<div class="col-md-12 py-2 bg-info shadow">
@php
  $group = App\Models\Models\Group::where('status','!=','2')->get();
@endphp
@foreach ($group as $group_nav_item)
<a href ="{{ url('collection/'.$group_nav_item->url)}}" class="px-4 text-white">{{$group_nav_item->name}} </a>
@endforeach




</div>



</div>
