<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Social Media</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/masonry.css') }}" rel="stylesheet">

    @yield('layout')


    
</head>
<body>
<div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/Newsfeed') }}">
                        Social Media
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <notification v-bind:notifications="notifications"></notification>
                        
                         <li class="dropdown">
                            <a href="{{ url('/Profiel') }}">
                                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/Instellingen') }}">Account instellingen</a></li>
                                <li><a href="{{ url('/ProfielInstellingen') }}">Profiel Aanpassing</a></li>

                                <li class="devider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Loguit
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</div>


        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript">

        $('.grid').masonry({
          itemSelector: '.grid-item',
          columnWidth: 20,
          horizontalOrder: true,
        });

        function show(id) {
            $( '#show_comment_text' + id ).slideToggle( "fast" ); 
        }

        function checklike(id) {
            if (id == 1 ) {
                document.getElementById('like').classList.remove('fas fa-heart fa-lg')
            }
        }
    </script>
</body>
</html>
