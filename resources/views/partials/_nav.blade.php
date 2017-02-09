<nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

              <a class="navbar-brand" href="/">Welcome</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active":""}}"><a href="/">Home</a></li>
                <li class="{{ Request::is('about') ? "active":""}}"><a href="/about">About Us</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">

@if(Auth::check())
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Hello, {{ Auth::user()->name }} <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="{{route('home')}}">Profile</a></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
          </ul>

        </li>

        @else 
        <a href="{{ route('login')}}" class="btn btn-default">Login</a>
        <a href="{{route('register')}}" class="btn btn-default">Register</a>
        @endif

              </ul>
            </div>
          </div>
        </nav>

