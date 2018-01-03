<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Micul Magazin</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('stylesheets')
</head>
<body style="background-color: #eeee;">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Micul Magazin
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if(Auth::guard('admin')->check())
                            <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        @endif
                        @if(Auth::guard('client')->check())
                            <li><a href="#0">Profil</a></li>
                        @endif
                        @if(!Auth::guard('client')->check() && !Auth::guard('admin')->check())
                            <li><a href="{{route('login')}}">Autentificare</a></li>
                            <li><a href="{{route('register')}}">Inregistrare</a></li>
                        @endif
                        @auth('admin')
                            <li><a href="{{route('orders')}}">Comenzi</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Categorii <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('category.add.show') }}">
                                            Adauga categorie
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('categories') }}">
                                            Lista categorii
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Produse <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('product.add.show') }}">
                                            Adauga produse
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('products') }}">
                                            Lista produse
                                        </a>
                                    </li>
                                    <hr>
                                    <li>
                                        <a href="{{route('colors')}}">
                                            Culori
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('lengths')}}">
                                            Marimi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::guard('admin')->user()->email }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('adminLogout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('adminLogout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endauth
                            @auth('client')
                                    <li class="dropdown">
                                        <a href="profile" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                            {{ Auth::guard('client')->user()->email }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('userLogout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('userLogout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                            @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-default second-navbar-home">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="left-nav-item"><a href="{{route('home')}}">Acasa</a></li>
                    <li class="left-nav-item"><a href="#0">Despre noi</a></li>
                    <li class="left-nav-item"><a href="#">Shop</a></li>
                    <li class="left-nav-item"><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#0"><input type="text" class="form-control" placeholder="Cauta in magazin..."></a></li>
                </ul>
            </div>
        </nav>

        @yield('content')

        <footer>
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <h4>Relatii cu clientii</h4>
                            <ul>
                                <li><a href="#0">Politica de returnare a unui produs</a></li>
                                <li><a href="#0">Livrarea unei comenzi si metode de plata disponibile</a></li>
                                <li><a href="#0">Contactati-ne</a></li>
                            </ul>

                            <div class="social-icons">
                                <ul>
                                    <li><a href="#0"><i class="fa fa-facebook-official social-icons-item" aria-hidden="true"></i></a>
                                    </li>
                                    <li><a href="#0"><i class="fa fa-twitter-square social-icons-item" aria-hidden="true"></i></a></li>
                                    <li><a href="#0"><i class="fa fa-instagram social-icons-item" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h4>Informatii generale</h4>
                            <ul>
                                <li><a href="#0">Despre noi</a></li>
                                <li><a href="#0">Cele mai vandute produse</a></li>
                                <li><a href="#0">Parteneriate</a></li>
                                <li><a href="#0">Politica de confidentialitate</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="box-wrapper text-center">
                                <h4>Micul Magazin</h4>
                                <hr>
                                <div class="contact">
                                    <ul>
                                        <li><span class="glyphicon glyphicon-map-marker"></span> Adresa</li>
                                        <li><span class="glyphicon glyphicon-earphone"></span> 0736628004</li>
                                        <li><span class="glyphicon glyphicon-envelope"></span> danieltuna97@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <section class="main-footer">
            <div class="container">
                <h5 class="text-center">&copy; @php echo date("Y");@endphp Micul Magazin. Toate drepturile rezervate.</h5>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.ez-plus.js') }}"></script>
    @yield('javascripts')
</body>
</html>
