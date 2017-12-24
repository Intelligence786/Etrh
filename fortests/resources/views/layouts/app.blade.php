<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Etherium') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/al/post.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
       <header>
            <a href="/"><img src="images/logo.png" alt="Etherium"></a>
            <form name="search" action="{{  route('Search') }}"  method="get" class="form-inline form-search pull-right">
                <div class="input-group">
                    <label class="sr-only" for="searchInput" display="block">Search</label>
                    <input class="form-control" id="searchInput" type="text"  name="search" placeholder="Search">
                    <div class="input-group-btn">
                        <button  type="submit" class="btn btn-primary">GO</button>
                    </div>
                </div>
            </form>
             </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->login }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/') }}">Main page</a>
                                        <a href="{{ url('/home') }}">My personal page</a>
                                        <a href="{{ route('saveGlob') }}">Creating post</a>
                                     <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><b>
                                            Logout</b>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>

        </header>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                   
                </div>
            </div>
        </nav>
<nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Моя страница</a></li>
                <li ><a href="/about/">Друзья</a></li>
                <li><a href="{{url('/allpeople')}}">Люди в эфире</a></li>
          <li>  <a href="{{ url('/addcontent') }}">Create posts</a></li>
                
            </ul>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
</body>
 <div class="footer">
        <p>Copyright &copy; 2017 Etherium.kg  
        </p>
            </div>
</html>
