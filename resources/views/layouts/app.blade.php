<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles App-->
    <link href="/css/app.css" rel="stylesheet">
    
    <!-- Styles StartUp-->
    <link href="/css/startup.css" rel="stylesheet">
    
    <!-- Style Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                <li class="{{ set_active(['/', '/']) }}"><a href="{{ url('/') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="{{ set_active(['login', 'login']) }}"><a href="{{ url('/login') }}">Login</a></li>
                        <li class="{{ set_active(['register', 'register']) }}"><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="/uploads/avatars/{{ Auth::user()->profile_photo }}" width="30" height="30" class="img-circle"> 
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                @hasrole('User')
                                <li>
                                    <a href="{{ url('/profile') }}">Profile</a>
                                </li> 
                                @endhasrole
                                
                                @hasrole('Moderator')
                                <li>
                                    <a href="{{ url('/admin') }}">Admin</a>
                                </li>   
                                @endhasrole
                                
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

 <div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">{{ config('app.name', 'Laravel') }} -
           Built with <i class="fa fa-coffee" aria-hidden="true"></i> and <i class="fa fa-heart" aria-hidden="true"></i>
      </p>
      
      <a href="{{ config('app.url', 'http://localhost') }}" class="navbar-text pull-right">
      Version 1.1</a>
    </div>
    
    
  </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/startup.js"></script>
@yield('scripts')  
</body>
</html>
